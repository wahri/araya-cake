<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CategoryProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use App\Models\SubCategoryProduct;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontpageController extends Controller
{

    function index()
    {
        $categoryWithProduct = CategoryProduct::with(['products', 'products.images'])->get();
        $sliders = Slider::all();
        $reviews = Review::all();

        $user = Auth::user();
        if ($user) {
            $cart = Cart::where('user_id', $user->id)->get();
        } else {
            $cart = Cart::where('session_id', session()->getId())->get();
        }

        // dd($cart->where('product_id', 10)->first()->quantity);

        return view('homepage', compact(['categoryWithProduct', 'sliders', 'reviews', 'cart']));
    }

    function about()
    {
        return view('about');
    }

    function detailCake(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_product_id', $product->category_product_id)->where('id', '!=', $product->id)->get();

        $user = Auth::user();
        if ($user) {
            $cart = Cart::where('user_id', $user->id)->get();
        } else {
            $cart = Cart::where('session_id', session()->getId())->get();
        }

        return view('detailCake', compact(['product', 'relatedProducts', 'cart']));
    }

    function product(Request $request)
    {
        $categoryProduct = CategoryProduct::get();
        return view('product', compact(['categoryProduct']));
    }

    function shop()
    {
        return view('shop');
    }

    function cart()
    {
        return view('cart');
    }

    function galleryCake()
    {
        $products = Product::all();
        return view('galleryCake', compact(['products']));
    }

    function contact()
    {
        return view('contact');
    }

    function showNota(string $nota_no)
    {
        $nota = Order::where('nota_no', $nota_no)->first();

        return view('detailNota', compact(['nota']));
    }

    public function confirmWhatsapp(string $nota_no)
    {
        $no_wa = WebSetting::where('setting_name', 'whatsapp')->first();
        $order = Order::where('nota_no', $nota_no)->first();
        $pesanWA = "Halo%20Admin%20Araya.....%0A%0ASaya%20mau%20pesan%20produk%20berikut%3A%0A";

        foreach ($order->orderDetail as $i => $item) {
            $pesanWA .= "*". ($i + 1) . ".%20" . urlencode($item->product->name)."*";
            if ($item->pilihan_type) {
                $pesanWA .= "%0A🎂%20Rasa : " . urlencode($item->pilihan_type);
            }
            if ($item->pilihan_color) {
                $pesanWA .= "%0A🎨%20Warna : " . urlencode($item->pilihan_color);
            }
            if ($item->cake_message) {
                $pesanWA .= "%0A📝%20Catatan : " . urlencode($item->cake_message);
            }
            $pesanWA .= "%0A📦%20Qty%3A%20" . urlencode($item->quantity) . "%20pcs";
            $pesanWA .= "%0A🏷%20Harga%3A%20" . urlencode(number_format($item->product->price * $item->quantity, 0, ',', '.')) . "%0A%0A";
        }

        $pesanWA .= "*Total%20Harga%3A%20" . urlencode(number_format($order->total_price, 0, ',', '.')) . "*%0A%0A";

        $pesanWA .= "*Berikut%20alamat%20lengkap%20saya%3A*%0ANama%20%3A%20" . urlencode($order->name) . "%0AAlamat%20%3A%20" . urlencode($order->address);
        $pesanWA .= "%0A%F0%9F%93%9D%20Catatan%3A%20" . urlencode($order->notes ?? '-');
        $pesanWA .= "%0A%0AMohon%20dapat%20diinfokan%20pembayarannya%20yaaa%0A%0ATerima%20kasiih%20%E2%9C%A8";

        return redirect()->to('https://api.whatsapp.com/send?text=' . $pesanWA . '&phone=' . $no_wa->value);
    }
    public function whatsappCustomCake()
    {
        $no_wa = WebSetting::where('setting_name', 'whatsapp')->first();
        $pesanWA = "Halo%20Admin%20Araya.....%0A%0ASaya%20mau%20pesan%20custom%20cake%3A%0A";

        return redirect()->to('https://api.whatsapp.com/send?text=' . $pesanWA . '&phone=' . $no_wa->value);
    }
    public function kirimPesan(Request $request)
    {
        $no_wa = WebSetting::where('setting_name', 'whatsapp')->first();
        $pesanWA = urlencode($request->message);

        return redirect()->to('https://api.whatsapp.com/send?text=' . $pesanWA . '&phone=' . $no_wa->value);
        
    }

    public function categoryProduct(Request $request,string $slug)
    {
        $category = CategoryProduct::where('slug', $slug)->first();

        $search = $request->input('search');
        $query = Product::query();
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('meta_title', 'like', '%' . $search . '%')
                  ->orWhere('meta_keyword', 'like', '%' . $search . '%')
                  ->orWhere('meta_description', 'like', '%' . $search . '%');
            });
        }
        $query->where('category_product_id', $category->id);
        $products = $query->get();

        return view('categoryProduct', compact(['products', 'category']));
    }
}

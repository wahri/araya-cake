<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function index()
    {

        $sessionId = Session::getId();
        if (Auth::check()) {
            $carts = Cart::where(['user_id' => Auth::id()])->get();
            $totalPrice = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', Auth::id())
                ->sum(DB::raw('carts.quantity * products.price'));
        } else {
            $carts = Cart::where(['session_id' => $sessionId])->get();
            $totalPrice = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.session_id', $sessionId)
                ->sum(DB::raw('carts.quantity * products.price'));
        }

        $totalPriceFormat = 'Rp. ' .  number_format($totalPrice, 0, ',', '.') . ',-';

        return view('cart', compact(['carts', 'totalPriceFormat']));
    }

    function addToCart(Request $request)
    {
        $cake_message = $request->input('cake_message');
        $pilihan_type = $request->input('pilihan_type') ?? null;
        $pilihan_color = $request->input('pilihan_color') ?? null;
        $quantity = $request->input('quantity');

        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $user = Auth::user();
        $sessionId = session()->getId();
        if ($user) {
            $cart = Cart::where(['user_id' => $user->id, 'product_id' => $productId])->first();
        } else {
            $cart = Cart::where(['session_id' => $sessionId, 'product_id' => $productId])->first();
        }

        $cart = new Cart();
        $cart->user_id = $user->id ?? NULL;
        $cart->session_id = $sessionId ?? NULL;
        $cart->product_id = $productId;
        $cart->quantity = $quantity;
        $cart->cake_message = $cake_message;
        $cart->pilihan_type = $pilihan_type;
        $cart->pilihan_color = $pilihan_color;
        $cart->save();

        if ($user) {
            $cartCount = Cart::where(['user_id' => $user->id])->sum('quantity');
        } else {
            $cartCount = Cart::where(['session_id' => $sessionId])->sum('quantity');
        }

        return response()->json([
            'message' => 'Berhasil menambahkan ke keranjang',
            'cart_count' => $cartCount,
            'cartId' => $cart->id,
            'quantity' => $cart->quantity,
        ]);
    }

    function updateCart(Request $request)
    {
        $cartId = $request->input('cartId');
        $qty = $request->input('qty');
        $cart = Cart::find($cartId);
        $user = Auth::user();
        $sessionId = $request->session()->getId();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        if ($user) {
            if ($cart->user_id != $user->id) {
                return response()->json(['message' => 'Cart not found'], 404);
            }
        } else {
            if ($cart->session_id != $sessionId) {
                return response()->json(['message' => 'Cart not found'], 404);
            }
        }

        $cart->quantity = $qty;
        $cart->save();

        if ($user) {
            $cartCount = Cart::where('user_id', $user->id)->sum('quantity');
            $totalProduct = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', $user->id)
                ->where('carts.id', $cartId)
                ->select(DB::raw('SUM(carts.quantity * products.price) as total'))
                ->value('total');
            $totalProductFormat = 'Rp. ' .  number_format($totalProduct, 0, ',', '.') . ',-';

            $totalPrice = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', $user->id)
                ->sum(DB::raw('carts.quantity * products.price'));
            $totalPriceFormat = 'Rp. ' .  number_format($totalPrice, 0, ',', '.') . ',-';
        } else {
            $cartCount = Cart::where('session_id', $sessionId)->sum('quantity');
            $totalProduct = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.session_id', $sessionId)
                ->where('carts.id', $cartId)
                ->select(DB::raw('SUM(carts.quantity * products.price) as total'))
                ->value('total');
            $totalProductFormat = 'Rp. ' .  number_format($totalProduct, 0, ',', '.') . ',-';

            $totalPrice = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.session_id', $sessionId)
                ->sum(DB::raw('carts.quantity * products.price'));
            $totalPriceFormat = 'Rp. ' .  number_format($totalPrice, 0, ',', '.') . ',-';
        }

        return response()->json([
            'message' => 'Berhasil mengupdate keranjang',
            'cart_count' => $cartCount,
            'qty' => $qty,
            'totalPrice' => $totalPriceFormat,
            'totalProduct' => $totalProductFormat,
        ]);
    }

    function deleteCart(Request $request)
    {
        $cart = Cart::findOrFail($request->cartId);
        $cart->delete();

        return response()->json([
            'message' => 'Berhasil menghapus item dari cart',   
        ]);
    }

    function processOrder(Request $request)
    {

        $sessionId = Session::getId();
        if (Auth::check()) {
            $carts = Cart::where(['user_id' => Auth::id()])->get();
            $totalPrice = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', Auth::id())
                ->sum(DB::raw('carts.quantity * products.price'));
        } else {
            $carts = Cart::where(['session_id' => $sessionId])->get();
            $totalPrice = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.session_id', $sessionId)
                ->sum(DB::raw('carts.quantity * products.price'));
        }

        if ($carts->count() > 0) {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required', 'string', 'email', 'max:255'
                ],
                'phone' => ['required', 'string', 'max:20'],
                'address' => ['required', 'string'],
                'notes' => ['nullable'],
                'order_type' => ['required', 'string'],
                'delivery_date' =>  ['required', 'date'],

            ], [
                'name.required' => 'Kolom nama harus diisi',
                'name.string' => 'Kolom nama harus berupa teks',
                'name.max' => 'Kolom nama maksimal 255 karakter',

                'email.required' => 'Kolom email harus diisi',
                'email.string' => 'Kolom email harus berupa teks',
                'email.email' => 'Format email tidak valid',
                'email.max' => 'Kolom email maksimal 255 karakter',
                'email.unique' => 'Email sudah digunakan',

                'phone.required' => 'Kolom nomor telepon harus diisi',
                'phone.string' => 'Kolom nomor telepon harus berupa teks',
                'phone.max' => 'Kolom nomor telepon maksimal 20 karakter',

                'address.required' => 'Kolom alamat harus diisi',
                'address.string' => 'Kolom alamat harus berupa teks',

                'delivery_date.required' => 'Tanggal pemesanan harus diisi',
            ]);

            $order = Order::create([
                'nota_no' => strtotime('now'),
                'session_id' => $sessionId,
                'user_id' => Auth::id() ?? null,
                'name' => $validatedData['name'],
                'no_whatsapp' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'notes' => $validatedData['notes'],
                'order_type' => $validatedData['order_type'],
                'delivery_date' => $validatedData['delivery_date'],
                'total_price' => $totalPrice,
            ]);

            foreach ($carts as $cartItem) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'cake_message' => $cartItem->cake_message,
                    'pilihan_type' => $cartItem->pilihan_type,
                    'pilihan_color' => $cartItem->pilihan_color,
                    'total' => $cartItem->product->price * $cartItem->quantity, // Sesuaikan dengan harga produk
                ]);

                $cartItem->delete();
            }

            return redirect()->route('showNota', $order->nota_no)->with('success', 'Berhasil Membuat Pesanan');

            // $pesanWA = "Halo%20Kak%20Araya.....%0A%0ASaya%20mau%20pesan%20produk%20berikut%3A%0A";

            // foreach ($carts as $i => $cart) {
            //     $pesanWA .= ($i + 1) . ".%20" . urlencode($cart->product->name) . "%0A%F0%9F%93%A6%20Qty%3A%20" . urlencode($cart->quantity) . "%20pcs%0A%EF%B8%8F%F0%9F%8F%B7%EF%B8%8F%20Harga%3A%20" . urlencode(number_format($cart->product->price * $cart->quantity, 0, ',', '.')) . "%0A%0A";
            // }

            // $pesanWA .= "%F0%9F%93%9D%20Catatan%3A%20" . urlencode($validatedData['notes'] ?? '-') . "%0A%0A";

            // $pesanWA .= "%F0%9F%8F%B7%EF%B8%8F%20Total%20Harga%3A%20" . urlencode(number_format($totalPrice, 0, ',', '.')) . "%0A%0A";

            // $pesanWA .= "Berikut%20alamat%20lengkap%20saya%3A%0ANama%20%3A%20" . urlencode($validatedData['name']) . "%0AAlamat%20%3A%20" . urlencode($validatedData['address']) . "%0A%0AMohon%20dapat%20diinfokan%20ongkir%20dan%20cara%20pembayarannya%20yaaa%0A%0ATerima%20kasiih%20%E2%9C%A8";

            // return redirect()->to('https://wa.me/6282175726466?text=' . $pesanWA);
        } else {
            return redirect()->route('product');
        }
    }
}

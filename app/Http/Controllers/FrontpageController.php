<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use App\Models\SubCategoryProduct;
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
        $relatedProducts = Product::where('category_product_id', $product->category_product_id)->get();

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
        // $categoryWithProduct = CategoryProduct::where('slug', $slug)->with(['products', 'products.images'])->first();
        $category = $request->input('category');
        $subCategories = $request->input('jenis');
        $search = $request->input('search');
        
        $query = Product::query();

        $categoryProductByFilter = null;
        
        if (!empty($category)) {
            $categoryProductByFilter = CategoryProduct::where('slug', $category)->first();
            $query->where('category_product_id', $categoryProductByFilter->id);
            // dd($categoryProductByFilter->subCategories->pluck('id')->toArray());
        }
        if (!empty($subCategories)) {
            $subCategoriesById = SubCategoryProduct::whereIn('slug', $subCategories)->pluck('id')->toArray();
            $query->whereIn('sub_category_product_id', $subCategoriesById);
        }
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('meta_title', 'like', '%' . $search . '%')
                  ->orWhere('meta_keyword', 'like', '%' . $search . '%')
                  ->orWhere('meta_description', 'like', '%' . $search . '%');
            });
        }
    
        
        $products = $query->get();
        // $products = Product::all();
        $user = Auth::user();
        if ($user) {
            $cart = Cart::where('user_id', $user->id)->get();
        } else {
            $cart = Cart::where('session_id', session()->getId())->get();
        }
        // dd($categoryWithProduct->products);
        return view('product', compact(['products','cart', 'subCategories', 'categoryProductByFilter']));
    }

    function shop()
    {
        return view('shop');
    }

    function cart()
    {
        return view('cart');
    }

    function galleryCake() {
        return view('galleryCake');
    }

    function contact() {
        return view('contact');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
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

    function product(string $slug)
    {
        $categoryWithProduct = CategoryProduct::where('slug', $slug)->with(['products', 'products.images'])->first();
        // dd($categoryWithProduct->products);
        return view('product', compact(['categoryWithProduct']));
    }

    function shop()
    {
        return view('shop');
    }

    function cart()
    {
        return view('cart');
    }
}

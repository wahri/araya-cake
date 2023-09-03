<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{
    function index()
    {
        $categoryWithProduct = CategoryProduct::with(['products', 'products.images'])->get();
        $sliders = Slider::all();
        $reviews = Review::all();
        return view('homepage', compact(['categoryWithProduct', 'sliders', 'reviews']));
    }
    function about()
    {
        return view('about');
    }
    function detailCake(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_product_id', $product->category_product_id)->get();
        
        return view('detailCake', compact(['product', 'relatedProducts']));
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

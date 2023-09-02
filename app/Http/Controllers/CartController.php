<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function index()
    {
        $sessionId = Session::getId();
        $carts = Cart::where(['session_id' => $sessionId])->get();

        $totalPrice = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.session_id', $sessionId)
            ->sum(DB::raw('carts.quantity * products.price'));
        return view('cart', compact(['carts', 'totalPrice']));
    }

    function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }


        $sessionId = $request->session()->getId();
        $cart = Cart::where(['session_id' => $sessionId, 'product_id' => $productId])->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->session_id = $sessionId;
            $cart->product_id = $productId;
            $cart->quantity = 1;
            $cart->save();
        } else {
            $cart->quantity += 1;
            $cart->save();
        }

        $cartCount = Cart::where(['session_id' => $sessionId])->count();
        return response()->json([
            'message' => 'Berhasil menambahkan ke keranjang',
            'cart_count' => $cartCount
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

        return view('cart', compact(['carts', 'totalPrice']));
    }

    function addToCart(Request $request)
    {
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

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = $user->id ?? NULL;
            $cart->session_id = $sessionId ?? NULL;
            $cart->product_id = $productId;
            $cart->quantity = 1;
            $cart->save();
        } else {
            $cart->quantity += 1;
            $cart->save();
        }

        if($user){
            $cartCount = Cart::where(['user_id' => $user->id])->sum('quantity');
        }else{
            $cartCount = Cart::where(['session_id' => $sessionId])->sum('quantity');
        }

        return response()->json([
            'message' => 'Berhasil menambahkan ke keranjang',
            'cart_count' => $cartCount
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
            $totalProductFormat = 'Rp. ' .  number_format($totalProduct, 0, ',', '.');

            $totalPrice = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.user_id', $user->id)
                ->sum(DB::raw('carts.quantity * products.price'));
            $totalPriceFormat = 'Rp. ' .  number_format($totalPrice, 0, ',', '.');
        } else {
            $cartCount = Cart::where('session_id', $sessionId)->sum('quantity');
            $totalProduct = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.session_id', $sessionId)
                ->where('carts.id', $cartId)
                ->select(DB::raw('SUM(carts.quantity * products.price) as total'))
                ->value('total');
            $totalProductFormat = 'Rp. ' .  number_format($totalProduct, 0, ',', '.');

            $totalPrice = Cart::join('products', 'carts.product_id', '=', 'products.id')
                ->where('carts.session_id', $sessionId)
                ->sum(DB::raw('carts.quantity * products.price'));
            $totalPriceFormat = 'Rp. ' .  number_format($totalPrice, 0, ',', '.');
        }

        return response()->json([
            'message' => 'Berhasil mengupdate keranjang',
            'cart_count' => $cartCount,
            'qty' => $qty,
            'totalPrice' => $totalPriceFormat,
            'totalProduct' => $totalProductFormat,
        ]);
    }

    function processOrder()
    {
        if (Auth::check()) {
            return redirect()->to('https://wa.me/6282175726466?text=Saya%20ingin%20pesan%20Tes');
        } else {
            return redirect()->route('register');
        }
    }
}

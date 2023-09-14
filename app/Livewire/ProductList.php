<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductList extends Component
{
    public $categoryProductId;
    function mount($categoryProductId)
    {
        $this->categoryProductId = $categoryProductId;
    }

    #[On('loadProduct')]
    public function render()
    {
        $user = Auth::user();
        if ($user) {
            $cart = Cart::where('user_id', $user->id)->get();
        } else {
            $cart = Cart::where('session_id', session()->getId())->get();
        }

        $queryProduct = Product::query();
        if ($this->categoryProductId != 0) {
            $categoryProduct = CategoryProduct::where('id', $this->categoryProductId)->first();
            $queryProduct->where('category_product_id', $categoryProduct->id);
        }else{
            $categoryProduct = CategoryProduct::all();
        }
        $products = $queryProduct->orderBy('id', 'desc')->get();

        return view('livewire.product-list', [
            'categoryProduct' => $categoryProduct,
            'products' => $products,
            'cart' => $cart
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\CategoryProduct;
use Livewire\Component;

class ProductList extends Component
{
    public $slug;
    function mount($slug) {
        $this->slug = $slug;
    }

    public function render()
    {
        $categoryWithProduct = CategoryProduct::where('slug', $this->slug)->with(['products', 'products.images'])->first();
        return view('livewire.product-list',[
            'categoryWithProduct' => $categoryWithProduct
        ]);
    }
}

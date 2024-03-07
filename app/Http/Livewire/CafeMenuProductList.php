<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;

class CafeMenuProductList extends Component
{
    public $products;

    public function render()
    {
        $this->products = Product::orderBy('product_id', 'desc')->limit(5)->get();

        return view('livewire.cafe-menu-product-list');
    }
}

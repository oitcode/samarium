<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;

class ProductList extends Component
{
    public $products;

    public function render()
    {
        $this->products = Product::all();

        return view('livewire.product-list');
    }
}

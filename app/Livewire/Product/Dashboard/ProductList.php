<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;

use App\Product;

class ProductList extends Component
{
    public $products;

    public function render()
    {
        $this->products = Product::orderBy('product_id', 'desc')->limit(5)->get();

        return view('livewire.product.dashboard.product-list');
    }
}

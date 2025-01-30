<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Product;

class ProductList extends Component
{
    use WithPagination;

    // public $products;

    public function render()
    {
        $products = Product::orderBy('product_id', 'desc')->paginate(5);

        return view('livewire.product.dashboard.product-list')
            ->with('products', $products);
    }
}

<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Product;

class ProductList extends Component
{
    use WithPagination;

    // public $products;
    public $totalProductCount; 

    public function render(): View
    {
        $products = Product::orderBy('product_id', 'desc')->paginate(5);
        $this->totalProductCount = Product::count();

        return view('livewire.product.dashboard.product-list')
            ->with('products', $products);
    }
}

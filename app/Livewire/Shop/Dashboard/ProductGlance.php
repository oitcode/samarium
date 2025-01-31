<?php

namespace App\Livewire\Shop\Dashboard;

use Livewire\Component;
use App\Product;
use App\ProductCategory;

class ProductGlance extends Component
{
    public $productCount;
    public $productCategoryCount;

    public function render()
    {
        $this->productCount = Product::all()->count();
        $this->productCategoryCount = ProductCategory::all()->count();

        return view('livewire.shop.dashboard.product-glance');
    }
}

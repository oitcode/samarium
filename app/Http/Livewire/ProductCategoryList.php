<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ProductCategory;

class ProductCategoryList extends Component
{
    public $productCategories;

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.product-category-list');
    }
}

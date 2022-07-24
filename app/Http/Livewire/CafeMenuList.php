<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ProductCategory;

class CafeMenuList extends Component
{
    public $productCategories;
    public $products = null;

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.cafe-menu-list');
    }

    public function selectCategory($productCategoryId)
    {
        $productCategory = ProductCategory::find($productCategoryId);

        $this->products = $productCategory->products;
    }
}

<?php

namespace App\Livewire\ProductCategory\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\ProductCategory;

class ProductCategorySearch extends Component
{
    public $product_category_search_name;

    public $productCategories;
    public $searchDone = false;

    public function render(): View
    {
        return view('livewire.product-category.dashboard.product-category-search');
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'product_category_search_name' => 'required',
        ]);

        $productCategories = ProductCategory::where('name', 'like', '%'.$validatedData['product_category_search_name'].'%')->get();

        $this->productCategories = $productCategories;
        $this->searchDone = true;
    }
}

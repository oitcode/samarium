<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use Livewire\WithPagination;
use App\ProductCategory;

class ProductCategoryList extends Component
{
    use ModesTrait;
    use WithPagination;

    // public $productCategories;
    public $products = null;
    public $selectedProductCategory;
    public $totalProductCategoryCount;

    public $search_product_category;

    public $modes = [
        'productCategoryProductList' => false,
    ];

    public function render(): View
    {
        $this->totalProductCategoryCount = ProductCategory::count();
        $productCategories = ProductCategory::orderBy('name', 'ASC')->paginate(5);

        return view('livewire.product-category.product-category-list')
            ->with('productCategories', $productCategories);
    }

    public function selectCategory($productCategoryId): void
    {
        $this->selectedProductCategory = ProductCategory::find($productCategoryId);
        $this->enterMode('productCategoryProductList');
    }

    public function searchProductCategory(): void
    {
        $validatedData = $this->validate([
            'search_product_category' => 'required',
        ]);

        $productCategories = ProductCategory::where('name', 'like', '%'.$validatedData['search_product_category'].'%')->get();

        $this->productCategories = $productCategories;
    }
}

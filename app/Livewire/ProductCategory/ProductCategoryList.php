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

    protected $productCategories;
    public $products = null;
    public $selectedProductCategory;
    public $totalProductCategoryCount;

    public $search_product_category;

    public $modes = [
        'productCategoryProductList' => false,
    ];

    public function mount(): void
    {
        $this->productCategories = ProductCategory::orderBy('name', 'ASC')->paginate(5);
    }

    public function render(): View
    {
        $this->totalProductCategoryCount = ProductCategory::count();

        return view('livewire.product-category.product-category-list')
            ->with('oproductCategories', $this->productCategories);
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

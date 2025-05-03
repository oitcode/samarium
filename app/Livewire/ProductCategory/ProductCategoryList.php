<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use Livewire\WithPagination;
use App\Services\ProductCategoryService;
use App\ProductCategory;

class ProductCategoryList extends Component
{
    use ModesTrait;
    use WithPagination;

    // protected $productCategories;
    public $products = null;
    public $selectedProductCategory;
    public $totalProductCategoryCount;
    public $deletingProductCategory;

    public $search_product_category;

    public $modes = [
        'productCategoryProductList' => false,
        'confirmDelete' => false,
        'cannotDelete' => false,
    ];

    public function mount(): void
    {
        $this->productCategories = ProductCategory::orderBy('name', 'ASC')->paginate(5);
    }

    public function render(): View
    {
        $productCategories = ProductCategory::orderBy('name', 'ASC')->paginate(5);
        $this->totalProductCategoryCount = ProductCategory::count();

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

    public function confirmDeleteProductCategory(int $product_category_id, ProductCategoryService $productCategoryService): void
    {
        $this->deletingProductCategory = ProductCategory::find($product_category_id);

        if ($productCategoryService->canDeleteProductCategory($product_category_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    public function cancelDeleteProductCategory(): void
    {
        $this->deletingProductCategory = null;
        $this->exitMode('confirmDelete');
    }

    public function cancelCannotDeleteProductCategory(): void
    {
        $this->deletingProductCategory = null;
        $this->exitMode('cannotDelete');
    }

    public function deleteProductCategory(ProductCategoryService $productCategoryService): void
    {
        $productCategoryService->deleteProductCategory($this->deletingProductCategory->product_category_id);
        $this->deletingProductCategory = null;
        $this->exitMode('confirmDelete');
    }
}

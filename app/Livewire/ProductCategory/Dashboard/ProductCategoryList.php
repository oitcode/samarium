<?php

namespace App\Livewire\ProductCategory\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use Livewire\WithPagination;
use App\Services\ProductCategoryService;
use App\Models\Product\ProductCategory;

/**
 * ProductCategoryList Component
 * 
 * This Livewire component handles the listing of product categories.
 */
class ProductCategoryList extends Component
{
    use ModesTrait;
    use WithPagination;

    /**
     * Product categories per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of product categories
     *
     * @var int
     */
    public $totalProductCategoryCount;

    /**
     * Product category which needs to be deleted
     *
     * @var ProductCategory
     */
    public $deletingProductCategory;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false,
        'cannotDelete' => false,
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(ProductCategoryService $productCategoryService): View
    {
        $productCategories = $productCategoryService->getPaginatedProductCategories($this->perPage);
        $this->totalProductCategoryCount = $productCategoryService->getTotalProductCategoryCount();
            
        return view('livewire.product-category.dashboard.product-category-list', [
            'productCategories' => $productCategories
        ]);
    }

    /**
     * Confirm if user really wants to delete a product category
     *
     * @return void
     */
    public function confirmDeleteProductCategory(int $product_category_id, ProductCategoryService $productCategoryService): void
    {
        $this->deletingProductCategory = ProductCategory::find($product_category_id);

        if ($productCategoryService->canDeleteProductCategory($product_category_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel product category delete
     *
     * @return void
     */
    public function cancelDeleteProductCategory(): void
    {
        $this->deletingProductCategory = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a product category cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteProductCategory(): void
    {
        $this->deletingProductCategory = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete product category
     *
     * @return void
     */
    public function deleteProductCategory(ProductCategoryService $productCategoryService): void
    {
        $productCategoryService->deleteProductCategory($this->deletingProductCategory->product_category_id);
        $this->deletingProductCategory = null;
        $this->exitMode('confirmDelete');
    }
}

<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Product;
use App\ProductCategory;

class ProductCategoryProductList extends Component
{
    use ModesTrait;

    public $productCategory;

    public $deletingProduct;

    public $modes = [
        'updateProductCategoryMode' => false,

        'delete' => false,
        'cannotDelete' => false,
    ];

    protected $listeners = [
        'updateProductCategoryCancelled',
        'updateProductCategoryCompleted',
    ];

    public function render(): View
    {
        return view('livewire.product-category.product-category-product-list');
    }

    public function deleteProduct(Product $product): void
    {
        $this->deletingProduct = $product;

        $this->enterMode('delete');

        if (count($product->saleInvoiceItems) > 0) {
            $this->enterModeSilent('cannotDelete');
        }
    }

    public function deleteProductCancel(): void
    {
        $this->deletingProduct = null;
        $this->exitMode('delete');
    }

    public function confirmDeleteProduct(): void
    {
        $this->deletingProduct->delete();

        $this->deletingProduct = null; 

        $this->productCategory = $this->productCategory->fresh();
        $this->exitMode('delete');
    }

    public function updateProductCategoryCancelled(): void
    {
        $this->exitMode('updateProductCategoryMode');
    }

    public function updateProductCategoryCompleted(): void
    {
        session()->flash('message', 'Product category updated');
        $this->exitMode('updateProductCategoryMode');
    }

    public function deleteProductCategory(ProductCategory $productCategory): void
    {
        $productCategory->delete();
        $this->dispatch('productCategoryDeleted');
    }
}

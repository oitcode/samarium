<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
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

    public function render()
    {
        return view('livewire.product-category.product-category-product-list');
    }

    public function deleteProduct(Product $product)
    {
        $this->deletingProduct = $product;

        $this->enterMode('delete');

        if (count($product->saleInvoiceItems) > 0) {
            $this->enterModeSilent('cannotDelete');
        }
    }

    public function deleteProductCancel()
    {
        $this->deletingProduct = null;
        $this->exitMode('delete');
    }

    public function confirmDeleteProduct()
    {
        $this->deletingProduct->delete();

        $this->deletingProduct = null; 

        $this->productCategory = $this->productCategory->fresh();
        $this->exitMode('delete');
    }

    public function updateProductCategoryCancelled()
    {
        $this->exitMode('updateProductCategoryMode');
    }

    public function updateProductCategoryCompleted()
    {
        session()->flash('message', 'Product category updated');
        $this->exitMode('updateProductCategoryMode');
    }

    public function deleteProductCategory(ProductCategory $productCategory)
    {
        $productCategory->delete();
        $this->dispatch('productCategoryDeleted');
    }
}

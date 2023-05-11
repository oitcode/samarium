<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\Product;

class CafeMenuProductCategoryProductList extends Component
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
        return view('livewire.cafe-menu-product-category-product-list');
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
}

<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use App\Traits\ModesTrait;

class ProductCategoryDisplay extends Component
{
    use ModesTrait;

    public $productCategory;

    public $modes = [
        'updateProductCategoryNameMode' => false,
        'updateProductCategoryImageMode' => false,
    ];

    protected $listeners = [
        'productCategoryUpdateNameCompleted',
        'productCategoryUpdateNameCancelled',

        'productCategoryUpdateImageCancelled',
        'productCategoryUpdateImageCompleted',
    ];

    public function render()
    {
        return view('livewire.product-category.product-category-display');
    }

    public function productCategoryUpdateNameCompleted()
    {
        $this->exitMode('updateProductCategoryNameMode');
    }

    public function productCategoryUpdateNameCancelled()
    {
        $this->exitMode('updateProductCategoryNameMode');
    }

    public function productCategoryUpdateImageCompleted()
    {
        $this->exitMode('updateProductCategoryImageMode');
    }

    public function productCategoryUpdateImageCancelled()
    {
        $this->exitMode('updateProductCategoryImageMode');
    }

    public function toggleProductCategorySellability()
    {
        if ($this->productCategory->does_sell == 'yes') {
            $this->productCategory->does_sell = 'no';
        } else {
            $this->productCategory->does_sell = 'yes';
        }

        $this->productCategory->save();
        $this->render();
    }

    public function closeThisComponent()
    {
        $this->dispatch('exitProductCategoryDisplayMode');
    }
}

<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        return view('livewire.product-category.product-category-display');
    }

    public function productCategoryUpdateNameCompleted(): void
    {
        $this->exitMode('updateProductCategoryNameMode');
    }

    public function productCategoryUpdateNameCancelled(): void
    {
        $this->exitMode('updateProductCategoryNameMode');
    }

    public function productCategoryUpdateImageCompleted(): void
    {
        $this->exitMode('updateProductCategoryImageMode');
    }

    public function productCategoryUpdateImageCancelled(): void
    {
        $this->exitMode('updateProductCategoryImageMode');
    }

    public function toggleProductCategorySellability(): void
    {
        if ($this->productCategory->does_sell == 'yes') {
            $this->productCategory->does_sell = 'no';
        } else {
            $this->productCategory->does_sell = 'yes';
        }

        $this->productCategory->save();
        $this->render();
    }

    public function closeThisComponent(): void
    {
        $this->dispatch('exitProductCategoryDisplayMode');
    }
}

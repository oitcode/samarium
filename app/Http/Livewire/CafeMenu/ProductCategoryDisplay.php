<?php

namespace App\Http\Livewire\CafeMenu;

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
        return view('livewire.cafe-menu.product-category-display');
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
}

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
    ];

    protected $listeners = [
        'productCategoryUpdateNameCompleted',
        'productCategoryUpdateNameCancelled',
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
}

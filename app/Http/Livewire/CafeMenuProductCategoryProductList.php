<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Traits\ModesTrait;

class CafeMenuProductCategoryProductList extends Component
{
    use ModesTrait;

    public $productCategory;

    public $modes = [
        'updateProductCategoryMode' => false,
    ];

    protected $listeners = [
        'updateProductCategoryCancelled',
        'updateProductCategoryCompleted',
    ];

    public function render()
    {
        return view('livewire.cafe-menu-product-category-product-list');
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

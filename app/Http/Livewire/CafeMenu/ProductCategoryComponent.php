<?php

namespace App\Http\Livewire\CafeMenu;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\ProductCategory;

class ProductCategoryComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'create' => false,
        'list' => true,
        'display' => false,
        'delete' => false,
        'search' => false,
    ];

    protected $listeners = [
        'productCategoryCreateCompleted',
        'productCategoryCreateCancelled',
        'displayProductCategory',
        'productCategoryDisplayCancelled',
    ];

    public function render()
    {
        return view('livewire.cafe-menu.product-category-component');
    }

    public function productCategoryCreateCancelled()
    {
        $this->exitMode('create');
    }

    public function productCategoryCreateCompleted()
    {
        session()->flash('message', 'Product category created.');
        $this->exitMode('create');
    }

    public function displayProductCategory(ProductCategory $productCategory)
    {
        $this->displayingProductCategory = $productCategory;

        $this->enterMode('display');
    }

    public function productCategoryDisplayCancelled()
    {
        $this->displayingProductCategory = null;

        $this->exitMode('display');
    }
}

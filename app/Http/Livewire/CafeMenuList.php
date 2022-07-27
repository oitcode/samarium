<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ProductCategory;

class CafeMenuList extends Component
{
    public $productCategories;
    public $products = null;
    public $selectedProductCategory;

    public $modes = [
        'productCategoryProductList' => false,
    ];

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.cafe-menu-list');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function selectCategory($productCategoryId)
    {
        $this->selectedProductCategory = ProductCategory::find($productCategoryId);
        $this->enterMode('productCategoryProductList');
    }
}

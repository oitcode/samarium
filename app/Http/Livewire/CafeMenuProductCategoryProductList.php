<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CafeMenuProductCategoryProductList extends Component
{
    public $productCategory;

    public function render()
    {
        return view('livewire.cafe-menu-product-category-product-list');
    }
}

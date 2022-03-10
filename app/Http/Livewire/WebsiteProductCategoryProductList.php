<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebsiteProductCategoryProductList extends Component
{
    public $productCategory;

    public function render()
    {
        return view('livewire.website-product-category-product-list');
    }
}

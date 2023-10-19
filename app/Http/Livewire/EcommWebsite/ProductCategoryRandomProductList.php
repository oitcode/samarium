<?php

namespace App\Http\Livewire\EcommWebsite;

use Livewire\Component;

class ProductCategoryRandomProductList extends Component
{
    public $productCategory;

    public function render()
    {
        return view('livewire.ecomm-website.product-category-random-product-list');
    }
}

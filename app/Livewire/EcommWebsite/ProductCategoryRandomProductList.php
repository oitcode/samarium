<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\View\View;

class ProductCategoryRandomProductList extends Component
{
    public $productCategory;

    public function render(): View
    {
        return view('livewire.ecomm-website.product-category-random-product-list');
    }
}

<?php

namespace App\Livewire\Product\Website;

use Livewire\Component;

class ProductListingDisplay extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.product.website.product-listing-display');
    }
}

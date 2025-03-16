<?php

namespace App\Livewire\Product\Website;

use Livewire\Component;
use Illuminate\View\View;

class ProductListingDisplay extends Component
{
    public $product;

    public function render(): View
    {
        return view('livewire.product.website.product-listing-display');
    }

    public function getCity()
    {
        if ($product->productSpecifications()->where('spec_heading', 'city')->first()) {
        };
    }
}

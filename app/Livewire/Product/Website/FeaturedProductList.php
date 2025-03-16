<?php

namespace App\Livewire\Product\Website;

use Livewire\Component;
use App\Product;

class FeaturedProductList extends Component
{
    public $featuredProducts;

    public function render()
    {
        $this->featuredProducts = Product::where('featured_product', 'yes')->limit(10)->get();

        return view('livewire.product.website.featured-product-list');
    }
}

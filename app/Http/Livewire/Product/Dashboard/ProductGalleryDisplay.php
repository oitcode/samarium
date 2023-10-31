<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

class ProductGalleryDisplay extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.product.dashboard.product-gallery-display');
    }
}

<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductGalleryDisplay extends Component
{
    public $product;

    public function render(): View
    {
        return view('livewire.product.dashboard.product-gallery-display');
    }
}

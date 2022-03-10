<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebsiteProductListDisplay extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.website-product-list-display');
    }
}

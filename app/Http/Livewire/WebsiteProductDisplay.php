<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebsiteProductDisplay extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.website-product-display');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CafeMenuProductDisplay extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.cafe-menu-product-display');
    }
}

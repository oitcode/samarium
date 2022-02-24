<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;

class CafeMenuComponent extends Component
{
    public $products;

    public function render()
    {
        $this->products = Product::all();

        return view('livewire.cafe-menu-component');
    }
}

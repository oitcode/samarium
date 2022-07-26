<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;

class InventoryComponent extends Component
{
    public $products;

    public function render()
    {
        $this->products = Product::where('base_product_id', null)->get();

        return view('livewire.inventory-component');
    }
}

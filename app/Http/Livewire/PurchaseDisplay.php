<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PurchaseDisplay extends Component
{
    public $purchase;

    public function render()
    {
        return view('livewire.purchase-display');
    }
}

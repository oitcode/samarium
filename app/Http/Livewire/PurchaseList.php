<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Purchase;

class PurchaseList extends Component
{
    public $purchases;

    public function render()
    {
        $this->purchases = Purchase::orderBy('purchase_id', 'desc')->get();

        return view('livewire.purchase-list');
    }
}

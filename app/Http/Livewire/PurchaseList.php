<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Purchase;

class PurchaseList extends Component
{
    public $purchases;
    public $total;

    public function render()
    {
        $this->purchases = Purchase::orderBy('purchase_id', 'desc')->get();
        $this->calculateTotal();

        return view('livewire.purchase-list');
    }

    public function calculateTotal()
    {
        $total = 0;

        foreach ($this->purchases as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        $this->total = $total;
    }
}

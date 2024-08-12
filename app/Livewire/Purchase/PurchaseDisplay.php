<?php

namespace App\Livewire\Purchase;

use Livewire\Component;

class PurchaseDisplay extends Component
{
    public $purchase;

    public $modes = [
        'payment' => true,
    ];

    protected $listeners = [
        'exitMakePaymentMode',
        'itemAddedToPurchase' => 'render',
    ];

    public function render()
    {
        return view('livewire.purchase.purchase-display');
    }

    public function exitMakePaymentMode()
    {
        $this->modes['payment'] = false;
    }
}

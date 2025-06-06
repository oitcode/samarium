<?php

namespace App\Livewire\Purchase\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

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

    public function render(): View
    {
        return view('livewire.purchase.dashboard.purchase-display');
    }

    public function exitMakePaymentMode(): void
    {
        $this->modes['payment'] = false;
    }
}

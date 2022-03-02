<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DaybookSaleInvoiceDisplayShowPayments extends Component
{
    public $saleInvoice;

    public function render()
    {
        return view('livewire.daybook-sale-invoice-display-show-payments');
    }
}

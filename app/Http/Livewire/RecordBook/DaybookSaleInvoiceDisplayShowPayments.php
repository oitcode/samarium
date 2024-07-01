<?php

namespace App\Http\Livewire\RecordBook;

use Livewire\Component;

class DaybookSaleInvoiceDisplayShowPayments extends Component
{
    public $saleInvoice;

    public function render()
    {
        return view('livewire.record-book.daybook-sale-invoice-display-show-payments');
    }
}

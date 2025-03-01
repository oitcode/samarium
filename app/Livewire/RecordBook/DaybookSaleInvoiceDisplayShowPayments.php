<?php

namespace App\Livewire\RecordBook;

use Livewire\Component;
use Illuminate\View\View;

class DaybookSaleInvoiceDisplayShowPayments extends Component
{
    public $saleInvoice;

    public function render(): View
    {
        return view('livewire.record-book.daybook-sale-invoice-display-show-payments');
    }
}

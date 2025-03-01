<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use Illuminate\View\View;

class SaleInvoiceDetail extends Component
{
    public $saleInvoice;

    public function render(): View
    {
        return view('livewire.sale.sale-invoice-detail');
    }
}

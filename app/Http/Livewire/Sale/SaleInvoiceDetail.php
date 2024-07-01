<?php

namespace App\Http\Livewire\Sale;

use Livewire\Component;

class SaleInvoiceDetail extends Component
{
    public $saleInvoice;

    public function render()
    {
        return view('livewire.sale.sale-invoice-detail');
    }
}

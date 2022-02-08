<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SaleInvoiceDetail extends Component
{
    public $saleInvoice;

    public function render()
    {
        return view('livewire.sale-invoice-detail');
    }
}

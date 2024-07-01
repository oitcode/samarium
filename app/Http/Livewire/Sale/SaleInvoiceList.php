<?php

namespace App\Http\Livewire\Sale;

use Livewire\Component;

use App\SaleInvoice;

class SaleInvoiceList extends Component
{
    public $saleInvoices;

    public function render()
    {
        $this->saleInvoices = SaleInvoice::all();

        return view('livewire.sale.sale-invoice-list');
    }
}

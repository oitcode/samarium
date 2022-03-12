<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SaleInvoice;

class RecentSaleInvoicesComponent extends Component
{
    public $saleInvoices;

    public function render()
    {
        $this->saleInvoices = SaleInvoice::orderBy('sale_invoice_id', 'desc')->limit(5)->get();

        return view('livewire.recent-sale-invoices-component');
    }
}

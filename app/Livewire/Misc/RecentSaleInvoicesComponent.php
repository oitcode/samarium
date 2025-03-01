<?php

namespace App\Livewire\Misc;

use Livewire\Component;
use Illuminate\View\View;
use App\SaleInvoice;

class RecentSaleInvoicesComponent extends Component
{
    public $saleInvoices;

    public function render(): View
    {
        $this->saleInvoices = SaleInvoice::orderBy('sale_invoice_id', 'desc')->limit(5)->get();

        return view('livewire.misc.recent-sale-invoices-component');
    }
}

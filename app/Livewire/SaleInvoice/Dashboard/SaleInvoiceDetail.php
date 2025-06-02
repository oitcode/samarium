<?php

namespace App\Livewire\SaleInvoice\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class SaleInvoiceDetail extends Component
{
    public $saleInvoice;

    public function render(): View
    {
        return view('livewire.sale-invoice.dashboard.sale-invoice-detail');
    }
}

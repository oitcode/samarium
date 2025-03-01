<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use Illuminate\View\View;

class SaleInvoiceWorkConfirmSaleInvoiceItemDelete extends Component
{
    public $deletingSaleInvoiceItem;

    public function render(): View
    {
        return view('livewire.sale.sale-invoice-work-confirm-sale-invoice-item-delete');
    }
}

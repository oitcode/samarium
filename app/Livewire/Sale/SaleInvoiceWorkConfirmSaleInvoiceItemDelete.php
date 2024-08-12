<?php

namespace App\Livewire\Sale;

use Livewire\Component;

class SaleInvoiceWorkConfirmSaleInvoiceItemDelete extends Component
{
    public $deletingSaleInvoiceItem;

    public function render()
    {
        return view('livewire.sale.sale-invoice-work-confirm-sale-invoice-item-delete');
    }
}

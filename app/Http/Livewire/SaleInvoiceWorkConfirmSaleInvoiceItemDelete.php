<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SaleInvoiceWorkConfirmSaleInvoiceItemDelete extends Component
{
    public $deletingSaleInvoiceItem;

    public function render()
    {
        return view('livewire.sale-invoice-work-confirm-sale-invoice-item-delete');
    }
}

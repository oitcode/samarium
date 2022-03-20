<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TakeawayWorkConfirmSaleInvoiceItemDelete extends Component
{
    public $deletingSaleInvoiceItem;

    public function render()
    {
        return view('livewire.takeaway-work-confirm-sale-invoice-item-delete');
    }
}

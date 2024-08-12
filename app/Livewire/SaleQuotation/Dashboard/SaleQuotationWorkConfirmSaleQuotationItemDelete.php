<?php

namespace App\Livewire\SaleQuotation\Dashboard;

use Livewire\Component;

class SaleQuotationWorkConfirmSaleQuotationItemDelete extends Component
{
    public $deletingSaleQuotationItem;

    public function render()
    {
        return view('livewire.sale-quotation.dashboard.sale-quotation-work-confirm-sale-quotation-item-delete');
    }
}

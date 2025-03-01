<?php

namespace App\Livewire\SaleQuotation\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class SaleQuotationWorkConfirmSaleQuotationItemDelete extends Component
{
    public $deletingSaleQuotationItem;

    public function render(): View
    {
        return view('livewire.sale-quotation.dashboard.sale-quotation-work-confirm-sale-quotation-item-delete');
    }
}

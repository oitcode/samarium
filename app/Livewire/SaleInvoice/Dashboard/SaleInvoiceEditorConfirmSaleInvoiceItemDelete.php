<?php

namespace App\Livewire\SaleInvoice\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class SaleInvoiceEditorConfirmSaleInvoiceItemDelete extends Component
{
    public $deletingSaleInvoiceItem;

    public function render(): View
    {
        return view('livewire.sale-invoice.dashboard.sale-invoice-editor-confirm-sale-invoice-item-delete');
    }
}

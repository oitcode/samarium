<?php

namespace App\Livewire\SaleInvoice\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\SaleInvoice;

class SaleInvoiceSearch extends Component
{
    public $saleInvoice;

    public $search_sale_invoice_id;
    public $search_customer_name;

    public function render(): View
    {
        return view('livewire.sale-invoice.dashboard.sale-invoice-search');
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'search_sale_invoice_id' => 'required|integer',
        ]);

        $this->saleInvoice = SaleInvoice::find($validatedData['search_sale_invoice_id']);
    }
}

<?php

namespace App\Livewire\Sale;

use Livewire\Component;
use App\SaleInvoice;

class SaleInvoiceSearch extends Component
{
    public $saleInvoice;

    public $search_sale_invoice_id;

    public function render()
    {
        return view('livewire.sale.sale-invoice-search');
    }

    public function search()
    {
        $validatedData = $this->validate([
            'search_sale_invoice_id' => 'required|integer',
        ]);

        $this->saleInvoice = SaleInvoice::find($validatedData['search_sale_invoice_id']);
    }
}

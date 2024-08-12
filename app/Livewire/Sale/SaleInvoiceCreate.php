<?php

namespace App\Livewire\Sale;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\SaleInvoice;

class SaleInvoiceCreate extends Component
{
    public function render()
    {
        $saleInvoice = $this->startSaleInvoice();

        return view('livewire.sale.sale-invoice-create')
            ->with('saleInvoice', $saleInvoice);
    }

    public function startSaleInvoice()
    {
        $saleInvoice = new SaleInvoice;

        $saleInvoice->sale_invoice_date = date('Y-m-d');
        $saleInvoice->payment_status = 'pending';
        $saleInvoice->creation_status = 'progress';

        /* User which created this record. */
        $saleInvoice->creator_id = Auth::user()->id;

        $saleInvoice->save();

        return $saleInvoice;
    }
}

<?php

namespace App\Http\Livewire\Takeaway;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Takeaway;
use App\SaleInvoice;

class TakeawayCreate extends Component
{
    public function render()
    {
        $takeaway = $this->startTakeaway();

        return view('livewire.sale.takeaway-create')
            ->with('takeaway', $takeaway);
    }

    public function startTakeaway()
    {
        $takeaway = new Takeaway;
        $takeaway->status = 'open';
        $takeaway->save();

        $saleInvoice = new SaleInvoice;

        $saleInvoice->sale_invoice_date = date('Y-m-d');
        $saleInvoice->takeaway_id = $takeaway->takeaway_id;
        $saleInvoice->payment_status = 'pending';
        $saleInvoice->creation_status = 'progress';

        /* User which created this record. */
        $saleInvoice->creator_id = Auth::user()->id;

        $saleInvoice->save();

        return $takeaway;
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Takeaway;

class TakeawayListConfirmDelete extends Component
{
    public $takeaway;

    public function render()
    {
        return view('livewire.takeaway-list-confirm-delete');
    }

    public function deleteTakeaway(Takeaway $takeaway)
    {
        $saleInvoice = $takeaway->saleInvoice;

        /* Delete any payments for this sale invoice */
        foreach ($saleInvoice->saleInvoicePayments as $saleInvoicePayment) {
            $saleInvoicePayment->delete();
        }

        /* Now delete sale invoice. First delete sale invoice items, then sale invoice. */
        foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
            $saleInvoiceItem->delete();
        }

        $saleInvoice->delete();

        $takeaway->delete();

        $this->emit('takeawayDeleted');
    }
}

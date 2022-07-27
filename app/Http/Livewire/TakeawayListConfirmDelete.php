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

        /* Delete sale invoice items. */
        foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
            $saleInvoiceItem->delete();
        }

        /* Delete sale invoice additions. */
        foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition) {
            $saleInvoiceAddition->delete();
        }

        $saleInvoice->delete();

        $takeaway->delete();

        $this->emit('takeawayDeleted');
    }
}

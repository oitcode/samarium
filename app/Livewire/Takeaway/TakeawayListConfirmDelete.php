<?php

namespace App\Livewire\Takeaway;

use Livewire\Component;
use Illuminate\View\View;
use App\Takeaway;

class TakeawayListConfirmDelete extends Component
{
    public $takeaway;

    public function render(): View
    {
        return view('livewire.sale.takeaway-list-confirm-delete');
    }

    public function deleteTakeaway(Takeaway $takeaway): void
    {
        $saleInvoice = $takeaway->saleInvoice;

        /* Delete any payments for this sale invoice */
        foreach ($saleInvoice->saleInvoicePayments as $saleInvoicePayment) {
            $saleInvoicePayment->delete();
        }

        /* Delete sale invoice items. */
        foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
            $this->updateInventory($saleInvoiceItem);
            $saleInvoiceItem->delete();
        }

        /* Delete sale invoice additions. */
        foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition) {
            $saleInvoiceAddition->delete();
        }

        $saleInvoice->delete();

        $takeaway->delete();

        $this->dispatch('takeawayDeleted');
    }

    public function updateInventory($saleInvoiceItem): void
    {
        $product = $saleInvoiceItem->product;

        if ($product->baseProduct) {
            $baseProduct = $product->baseProduct;

            $additionQty = $product->inventory_unit_consumption * $saleInvoiceItem->quantity;
            $baseProduct->stock_count += $additionQty;
            $baseProduct->save();
        } else {
            $product->stock_count += $saleInvoiceItem->quantity; 
            $product->save();
        }
    }
}

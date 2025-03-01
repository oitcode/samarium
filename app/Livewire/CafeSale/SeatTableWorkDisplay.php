<?php

namespace App\Livewire\CafeSale;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\ModesTrait;
use App\SeatTableBooking;
use App\SaleInvoice;
use App\SaleInvoiceItem;

class SeatTableWorkDisplay extends Component
{
    use ModesTrait;

    public $seatTable;

    public $deletingSaleInvoiceItem = null; 

    public $modes = [
        'addItem' => true,
        'makePayment' => true,
        'confirmRemoveSaleInvoiceItem' => false,
    ];

    protected $listeners = [
        'exitAddItemMode',
        'exitMakePaymentMode',
        'itemAddedToBooking',
        'removeItemFromCurrentBooking',
        'exitDeleteSaleInvoiceItem',
    ];

    public function render(): View
    {
        return view('livewire.cafe-sale.seat-table-work-display');
    }

    public function bookSeatTable(): void
    {
        /*
         * --------------------------------------------------------------------
         * CONCEPT
         * --------------------------------------------------------------------
         *
         * When you book a seat table you start a new sale_invoice.
         *
         *
         */

        /* Create a seat table booking. */
        $seatTableBooking = new SeatTableBooking;

        $seatTableBooking->seat_table_id = $this->seatTable->seat_table_id;
        $seatTableBooking->booking_date = date('Y-m-d');
        $seatTableBooking->status = 'open';

        $seatTableBooking->save();

        /* Create a sale invoice */
        $saleInvoice = new SaleInvoice;

        $saleInvoice->sale_invoice_date = date('Y-m-d');
        $saleInvoice->seat_table_booking_id = $seatTableBooking->seat_table_booking_id;
        $saleInvoice->payment_status = 'pending';

        /* User which created this record. */
        $saleInvoice->creator_id = Auth::user()->id;

        $saleInvoice->save();

        $this->render();
    }

    public function exitAddItemMode(): void
    {
        $this->exitMode('addItem');
    }

    public function exitMakePaymentMode(): void
    {
        $this->exitMode('makePayment');
    }

    public function itemAddedToBooking(): void
    {
        $this->dispatch('makePaymentPleaseUpdate');
        $this->render();
    }

    public function closeTable(): void
    {
        $currentBooking = $this->seatTable->getCurrentBooking();
        $saleInvoice = $currentBooking->saleInvoice;

        /* Dont do anything if any items added in sale invoice */
        if (count($currentBooking->saleInvoice->saleInvoiceItems) > 0) {
            return;
        }

        DB::beginTransaction();

        try {
            $currentBooking->status = 'closed';
            $currentBooking->save();

            $saleInvoice->payment_status = 'aborted';
            $saleInvoice->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }

    public function confirmRemoveItemFromCurrentBooking($saleInvoiceItemId): void
    {
        $saleInvoiceItem = SaleInvoiceItem::find($saleInvoiceItemId);

        $this->deletingSaleInvoiceItem = $saleInvoiceItem;
        $this->enterMode('confirmRemoveSaleInvoiceItem');
    }

    public function removeItemFromCurrentBooking($saleInvoiceItemId): void
    {
        $saleInvoiceItem = SaleInvoiceItem::find($saleInvoiceItemId);

        DB::beginTransaction();

        try {
            $product = $saleInvoiceItem->product;
            $quantity = $saleInvoiceItem->quantity;

            $saleInvoiceItem->delete_reason = 'Removed by user';
            $saleInvoiceItem->save();
            $saleInvoiceItem->delete();

            /* Reverse stock count */
            $this->updateInventory($product, $quantity, 'in');

            DB::commit();

            $this->dispatch('updatePaymentComponent');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->deletingSaleInvoiceItem = null;
        $this->exitMode('confirmRemoveSaleInvoiceItem');
        $this->render();
    }

    public function exitDeleteSaleInvoiceItem(): void
    {
        $this->deletingSaleInvoiceItem = null;
        $this->exitMode('confirmRemoveSaleInvoiceItem');
    }

    public function enterMultiMode($modeName): void
    {
        $this->modes[$modeName] = true;
    }

    public function updateInventory($product, $quantity, $direction): void
    {
        if ($product->baseProduct) {
            $baseProduct = $product->baseProduct;
            $diffQty = $product->inventory_unit_consumption * $quantity;

            if ($direction == 'in') {
                $baseProduct->stock_count += $diffQty;
            } else if ($direction == 'out') {
                $baseProduct->stock_count -= $diffQty;
            } else {
                // Todo
            }

            $baseProduct->save();
        } else {
            if ($direction == 'in') {
                $product->stock_count += $quantity; 
            } else if ($direction == 'out') {
                $product->stock_count -= $quantity; 
            } else {
                // Todo
            }

            $product->save();
        }
    }

    public function deleteSeatTable(): void
    {
        $this->seatTable->delete();
        $this->dispatch('seatTableDeleted');
    }
}

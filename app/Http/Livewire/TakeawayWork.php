<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\SaleInvoice;
use App\SeatTableBooking;
use App\SaleInvoiceItem;
use App\Takeaway;

class TakeawayWork extends Component
{
    public $takeaway;

    public $deletingSaleInvoiceItem = null; 

    public $modes = [
        'addItem' => true,
        'makePayment' => true,
        'confirmRemoveSaleInvoiceItem' => false,
    ];

    protected $listeners = [
        'exitAddItemMode',
        'exitMakePaymentMode',
        'itemAddedToTakeaway',
        'removeItemFromCurrentBooking',
        'exitDeleteSaleInvoiceItem',
    ];

    public function render()
    {
        return view('livewire.takeaway-work');
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

        $saleInvoice->save();

        $this->render();
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function exitMakePaymentMode()
    {
        $this->exitMode('makePayment');
    }

    public function confirmRemoveItemFromTakeaway($saleInvoiceItemId)
    {
        $saleInvoiceItem = SaleInvoiceItem::find($saleInvoiceItemId);

        $this->deletingSaleInvoiceItem = $saleInvoiceItem;
        $this->enterMode('confirmRemoveSaleInvoiceItem');
    }

    public function removeItemFromCurrentBooking($saleInvoiceItemId)
    {
        $saleInvoiceItem = SaleInvoiceItem::find($saleInvoiceItemId);

        DB::beginTransaction();

        try {
            $saleInvoiceItem->delete_reason = 'Removed by user';
            $saleInvoiceItem->save();
            $saleInvoiceItem->delete();

            /* Reverse stock count */
            $product = $saleInvoiceItem->product;
            $product->stock_count += $saleInvoiceItem->quantity;
            $product->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->deletingSaleInvoiceItem = null;
        $this->exitMode('confirmRemoveSaleInvoiceItem');
        $this->render();
    }

    public function exitDeleteSaleInvoiceItem()
    {
        $this->deletingSaleInvoiceItem = null;
        $this->exitMode('confirmRemoveSaleInvoiceItem');
    }

    public function itemAddedToTakeaway()
    {
        $this->emit('makePaymentPleaseUpdate');
        $this->render();
    }
}

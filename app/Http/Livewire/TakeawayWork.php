<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\SaleInvoice;
use App\SeatTableBooking;
use App\SaleInvoiceItem;
use App\Takeaway;

use App\SaleInvoiceAdditionHeading;

class TakeawayWork extends Component
{
    public $takeaway;

    public $deletingSaleInvoiceItem = null; 

    public $has_vat;

    public $sale_invoice_date;

    public $modes = [
        'addItem' => true,
        'makePayment' => true,
        'confirmRemoveSaleInvoiceItem' => false,
        'backDate' => false,
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
        $this->has_vat = $this->hasVat();
        $this->sale_invoice_date = $this->takeaway->saleInvoice->sale_invoice_date;

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

    public function enterModeSilent($modeName)
    {
        $this->modes[$modeName] = true;
    }

    public function exitMakePaymentMode()
    {
        $this->exitMode('makePayment');
    }

    public function confirmRemoveItemFromTakeaway($saleInvoiceItemId)
    {
        $saleInvoiceItem = SaleInvoiceItem::find($saleInvoiceItemId);

        $this->deletingSaleInvoiceItem = $saleInvoiceItem;
        // $this->enterMode('confirmRemoveSaleInvoiceItem');
        $this->modes['confirmRemoveSaleInvoiceItem'] = true;
    }

    public function removeItemFromCurrentBooking($saleInvoiceItemId)
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

            // $product->stock_count += $quantity;
            // $product->save();

            /*
             * This needed for bugfix #11. If this is not added
             * then the takeaway item list does not update in the UI.
             */
            $this->takeaway = $this->takeaway->fresh();

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

    public function hasVat()
    {
        if (SaleInvoiceAdditionHeading::where('name', 'vat')->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateInventory($product, $quantity, $direction)
    {
        if ($product->baseProduct) {
            $baseProduct = $product->baseProduct;
            $diffQty = $product->inventory_unit_consumption * $quantity;

            if ($direction == 'in') {
                $baseProduct->stock_count += $diffQty;
            } else if ($direction == 'out') {
                $baseProduct->stock_count -= $diffQty;
            } else {
                dd('Whoops! Inventory update gone wrong!');
            }

            $baseProduct->save();
        } else {
            if ($direction == 'in') {
                $product->stock_count += $quantity; 
            } else if ($direction == 'out') {
                $product->stock_count -= $quantity; 
            } else {
                dd('Whoops! Inventory update gone wrong!');
            }

            $product->save();
        }
    }

    public function changeSaleInvoiceDate()
    {
        $validatedData = $this->validate([
            'sale_invoice_date' => 'required|date',
        ]);

        $saleInvoice = $this->takeaway->saleInvoice;
        $saleInvoice->sale_invoice_date = $validatedData['sale_invoice_date'];
        $saleInvoice->save();

        $this->takeaway = $this->takeaway->fresh();
        $this->modes['backDate'] = false;
        $this->render();
    }
}

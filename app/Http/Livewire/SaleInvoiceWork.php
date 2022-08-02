<?php

namespace App\Http\Livewire;

use App\Traits\ModesTrait;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\SaleInvoice;
use App\SaleInvoiceItem;
use App\SaleInvoiceAdditionHeading;

class SaleInvoiceWork extends Component
{
    use ModesTrait;

    public $saleInvoice;

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
        'itemAddedToSaleInvoice',
        'removeItemFromCurrentBooking',
        'exitDeleteSaleInvoiceItem',
    ];

    public function render()
    {
        $this->has_vat = $this->hasVat();
        $this->sale_invoice_date = $this->saleInvoice->sale_invoice_date;

        return view('livewire.sale-invoice-work');
    }

    public function exitMakePaymentMode()
    {
        $this->exitMode('makePayment');
    }

    public function confirmRemoveItemFromSaleInvoice($saleInvoiceItemId)
    {
        $saleInvoiceItem = SaleInvoiceItem::find($saleInvoiceItemId);

        $this->deletingSaleInvoiceItem = $saleInvoiceItem;
        $this->modes['confirmRemoveSaleInvoiceItem'] = true;
    }

    public function removeItemFromSaleInvoice($saleInvoiceItemId)
    {
        $saleInvoiceItem = SaleInvoiceItem::find($saleInvoiceItemId);

        DB::beginTransaction();

        try {
            $product = $saleInvoiceItem->product;
            $quantity = $saleInvoiceItem->quantity;

            $saleInvoiceItem->delete_reason = 'Removed by user';
            $saleInvoiceItem->save();
            $saleInvoiceItem->delete();

            $this->updateInventory($product, $quantity, 'in');
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

    public function itemAddedToSaleInvoice()
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

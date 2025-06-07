<?php

namespace App\Livewire\SaleInvoice\Dashboard;

use App\Traits\ModesTrait;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\SaleInvoice\SaleInvoice;
use App\Models\SaleInvoice\SaleInvoiceItem;
use App\Models\SaleInvoice\SaleInvoiceAdditionHeading;
use App\Models\Customer\Customer;

class SaleInvoiceWork extends Component
{
    use ModesTrait;

    public $saleInvoice;

    public $deletingSaleInvoiceItem = null; 
    public $has_vat;
    public $sale_invoice_date;

    public $customers;
    public $customer_id;

    public $modes = [
        'addItem' => false,
        'makePayment' => true,
        'confirmRemoveSaleInvoiceItem' => false,
        'backDate' => false,
        'customerSelected' => false,
    ];

    protected $listeners = [
        'exitAddItemMode',
        'exitMakePaymentMode',
        'itemAddedToSaleInvoice',
        'removeItemFromSaleInvoice',
        'exitDeleteSaleInvoiceItem',
        'completeTheTransaction',
    ];

    public function render(): View
    {
        $this->has_vat = SaleInvoiceAdditionHeading::where('name', 'vat')->exists();
        $this->sale_invoice_date = $this->saleInvoice->sale_invoice_date;
        $this->customers = Customer::all();

        return view('livewire.sale-invoice.dashboard.sale-invoice-work');
    }

    public function exitMakePaymentMode(): void
    {
        $this->exitMode('makePayment');
    }

    public function confirmRemoveItemFromSaleInvoice($saleInvoiceItemId): void
    {
        $saleInvoiceItem = SaleInvoiceItem::find($saleInvoiceItemId);

        $this->deletingSaleInvoiceItem = $saleInvoiceItem;
        $this->modes['confirmRemoveSaleInvoiceItem'] = true;
    }

    public function removeItemFromSaleInvoice($saleInvoiceItemId): void
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
            $this->saleInvoice= $this->saleInvoice->fresh();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->deletingSaleInvoiceItem = null;
        $this->exitMode('confirmRemoveSaleInvoiceItem');
        $this->dispatch('makePaymentPleaseUpdate');
        $this->render();
    }

    public function exitDeleteSaleInvoiceItem(): void
    {
        $this->deletingSaleInvoiceItem = null;
        $this->exitMode('confirmRemoveSaleInvoiceItem');
    }

    public function itemAddedToSaleInvoice(): void
    {
        $this->dispatch('makePaymentPleaseUpdate');
        $this->render();
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

    public function changeSaleInvoiceDate(): void
    {
        $validatedData = $this->validate([
            'sale_invoice_date' => 'required|date',
        ]);

        $saleInvoice = $this->saleInvoice;
        $saleInvoice->sale_invoice_date = $validatedData['sale_invoice_date'];
        $saleInvoice->save();

        $this->saleInvoice = $this->saleInvoice->fresh();
        $this->modes['backDate'] = false;
        $this->render();
    }

    public function linkCustomerToSaleInvoice(): void
    {
        $validatedData = $this->validate([
            'customer_id' => 'required|integer',
        ]);

        $this->saleInvoice->customer_id = $validatedData['customer_id'];
        $this->saleInvoice->save();
        $this->saleInvoice = $this->saleInvoice->fresh();

        $this->modes['customerSelected'] = true;
    }

    public function closeThisComponent(): void
    {
        $this->dispatch('exitSaleInvoiceWorkMode');
    }

    public function completeTheTransaction(): void
    {
        $this->saleInvoice = $this->saleInvoice->fresh();
        $this->render();
    }
}

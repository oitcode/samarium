<?php

namespace App\Livewire\SaleQuotation\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Traits\ModesTrait;
use App\Models\SaleQuotation\SaleQuotation;
use App\Models\SaleQuotation\SaleQuotationItem;
use App\Models\SaleInvoice\SaleInvoiceAdditionHeading;
use App\Models\Customer\Customer;

class SaleQuotationWork extends Component
{
    use ModesTrait;

    public $saleQuotation;

    public $deletingSaleQuotationItem = null; 
    public $has_vat;
    public $sale_quotation_date;

    public $customers;
    public $customer_id;

    public $modes = [
        'addItem' => false,
        'confirmRemoveSaleQuotationItem' => false,
        'backDate' => false,
        'customerSelected' => false,
    ];

    protected $listeners = [
        'exitAddItemMode',
        'itemAddedToSaleQuotation',
        'removeItemFromSaleQuotation',
        'exitDeleteSaleQuotationItem',
    ];

    public function render(): View
    {
        $this->has_vat = SaleInvoiceAdditionHeading::where('name', 'vat')->exists();
        $this->sale_quotation_date = $this->saleQuotation->sale_quotation_date;
        $this->customers = Customer::all();

        return view('livewire.sale-quotation.dashboard.sale-quotation-work');
    }

    public function confirmRemoveItemFromSaleQuotation($saleQuotationItemId): void
    {
        $saleQuotationItem = SaleQuotationItem::find($saleQuotationItemId);

        $this->deletingSaleQuotationItem = $saleQuotationItem;
        $this->modes['confirmRemoveSaleQuotationItem'] = true;
    }

    public function removeItemFromSaleQuotation($saleQuotationItemId): void
    {
        $saleQuotationItem = SaleQuotationItem::find($saleQuotationItemId);

        DB::beginTransaction();

        try {
            $product = $saleQuotationItem->product;
            $quantity = $saleQuotationItem->quantity;

            $saleQuotationItem->delete();

            $this->saleQuotation = $this->saleQuotation->fresh();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->deletingSaleQuotationItem = null;
        $this->exitMode('confirmRemoveSaleQuotationItem');
        $this->render();
    }

    public function exitDeleteSaleQuotationItem(): void
    {
        $this->deletingSaleQuotationItem = null;
        $this->exitMode('confirmRemoveSaleQuotationItem');
    }

    public function itemAddedToSaleQuotation(): void
    {
        $this->render();
    }

    public function changeSaleQuotationDate(): void
    {
        $validatedData = $this->validate([
            'sale_quotation_date' => 'required|date',
        ]);

        $saleQuotation = $this->saleQuotation;
        $saleQuotation->sale_quotation_date = $validatedData['sale_quotation_date'];
        $saleQuotation->save();

        $this->saleQuotation = $this->saleQuotation->fresh();
        $this->modes['backDate'] = false;
        $this->render();
    }

    public function linkCustomerToSaleQuotation(): void
    {
        $validatedData = $this->validate([
            'customer_id' => 'required|integer',
        ]);

        $this->saleQuotation->customer_id = $validatedData['customer_id'];
        $this->saleQuotation->save();
        $this->saleQuotation = $this->saleQuotation->fresh();

        $this->modes['customerSelected'] = true;
    }
}

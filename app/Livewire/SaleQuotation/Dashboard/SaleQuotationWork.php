<?php

namespace App\Livewire\SaleQuotation\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Traits\ModesTrait;

use App\SaleQuotation;
use App\SaleQuotationItem;
use App\SaleInvoiceAdditionHeading;
use App\Customer;

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

    public function render()
    {
        $this->has_vat = $this->hasVat();
        $this->sale_quotation_date = $this->saleQuotation->sale_quotation_date;
        $this->customers = Customer::all();

        return view('livewire.sale-quotation.dashboard.sale-quotation-work');
    }

    public function confirmRemoveItemFromSaleQuotation($saleQuotationItemId)
    {
        $saleQuotationItem = SaleQuotationItem::find($saleQuotationItemId);

        $this->deletingSaleQuotationItem = $saleQuotationItem;
        $this->modes['confirmRemoveSaleQuotationItem'] = true;
    }

    public function removeItemFromSaleQuotation($saleQuotationItemId)
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
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->deletingSaleQuotationItem = null;
        $this->exitMode('confirmRemoveSaleQuotationItem');
        $this->render();
    }

    public function exitDeleteSaleQuotationItem()
    {
        $this->deletingSaleQuotationItem = null;
        $this->exitMode('confirmRemoveSaleQuotationItem');
    }

    public function itemAddedToSaleQuotation()
    {
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

    public function changeSaleQuotationDate()
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

    public function linkCustomerToSaleQuotation()
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

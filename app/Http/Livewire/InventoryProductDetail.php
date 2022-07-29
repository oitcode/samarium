<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

use App\Product;
use App\SaleInvoice;
use App\Purchase;
use App\SaleInvoiceItem;
use App\PurchaseItem;

class InventoryProductDetail extends Component
{
    public $product;

    public $startDate = null;
    public $endDate = null;

    public $saleInvoiceItems;
    public $purchaseItems;

    public function mount()
    {
        $this->startDate = date('Y-m-d');
    }

    public function render()
    {
        $this->getTransactionsForDateRange();

        return view('livewire.inventory-product-detail');
    }

    public function getTransactionsForDateRange()
    {
        $this->getSaleInvoiceItemsForDateRange();
        $this->getPurchaseItemsForDateRange();
    }

    public function getSaleInvoiceItemsForDateRange()
    {
        $saleInvoiceItems = $this->product->saleInvoiceItems()->whereHas('saleInvoice', function (Builder $query) {
            $query->whereDate('sale_invoice_date', $this->startDate);
        })->get();;

        $this->saleInvoiceItems = $saleInvoiceItems;
    }

    public function getPurchaseItemsForDateRange()
    {
    }
}

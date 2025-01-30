<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
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

    public $startingBalance;

    public function mount()
    {
        $this->startDate = date('Y-m-d');
    }

    public function render()
    {
        if ($this->product->stock_applicable == 'no') {
            return '<div>Stock not enabled for this product</div>';
        }

        if ($this->product->opening_stock_timestamp === null) {
            return '<div>Product inventory setting is wrong.
            <br />
            Opening stock time is not given.
            <br />
            Contact support for assistance.</div> ';
        }

        if ($this->product->opening_stock_count === null) {
            return '<div>Product inventory setting is wrong.
            <br />
            Opening stock count not given.
            <br />
            Contact support for assistance.</div> ';
        }

        $this->getTransactionsForDateRange();

        $this->startingBalance = $this->getStartingBalance($this->startDate);

        return view('livewire.inventory.inventory-product-detail');
    }

    public function getTransactionsForDateRange()
    {
        /* Todo: Validation */
        $validatedData = $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'nullable|date',
        ]);

        /*
         * If start date is before the day inventory was
         * started for this product then say it cant be done
         * because we were not tracking inventory back then!
         *
         */
         $openingStockDate = substr($this->product->opening_stock_timestamp, 0, 10);
         if ($validatedData['startDate'] < $openingStockDate) {
             dd ('Start date too early');
         }

        /* Return if start date and end date are not aligned. */
        if ($validatedData['endDate']) {
            if (! $validatedData['startDate']) {
                return;
            }

            if ($validatedData['startDate'] > $validatedData['endDate']) {
                return;
            }
        }

        $this->getSaleInvoiceItemsForDateRange();
        $this->getPurchaseItemsForDateRange();

        $this->arrangeItems();
    }

    public function getSaleInvoiceItemsForDateRange()
    {
        $saleInvoiceItems = new Collection;

        if ($this->product->subProducts && count($this->product->subProducts) > 0) {
            foreach ($this->product->subProducts as $product) {
                $items = $product->saleInvoiceItems()
                    ->whereHas('saleInvoice', function (Builder $query) {
                        $query->where('created_at', '>=', $this->product->opening_stock_timestamp)
                            ->where('sale_invoice_date', '>=', $this->startDate);
                        if ($this->endDate) {
                            $query->where('sale_invoice_date', '<=', $this->endDate);
                        }
                    })->get();
                $saleInvoiceItems = $saleInvoiceItems->merge($items);
            }
        } else {
            $saleInvoiceItems = $this->product->saleInvoiceItems()
                ->whereHas('saleInvoice', function (Builder $query) {
                    $query->where('created_at', '>=', $this->product->opening_stock_timestamp)
                        ->where('sale_invoice_date', '>=', $this->startDate);
                    if ($this->endDate) {
                        $query->where('sale_invoice_date', '<=', $this->endDate);
                    }
                })->get();
        }

        $this->saleInvoiceItems = $saleInvoiceItems;
    }

    public function getPurchaseItemsForDateRange()
    {
        $purchaseItems = new Collection;

        if ($this->product->subProducts && count($this->product->subProducts) > 0) {
            foreach ($this->product->subProducts as $product) {
                $items = $product->purchaseItems()
                    ->whereHas('purchase', function (Builder $query) {
                        $query->where('created_at', '>=', $this->product->opening_stock_timestamp)
                            ->where('purchase_date', '>=', $this->startDate);
                        if ($this->endDate) {
                            $query->where('purchase_date', '<=', $this->endDate);
                        }
                    })->get();
                $purchaseItems = $purchaseItems->merge($items);
            }
        } else {
            $purchaseItems = $this->product->purchaseItems()
                ->whereHas('purchase', function (Builder $query) {
                    $query->where('created_at', '>=', $this->product->opening_stock_timestamp)
                        ->where('purchase_date', '>=', $this->startDate);
                    if ($this->endDate) {
                        $query->where('purchase_date', '<=', $this->endDate);
                    }
                })->get();
        }

        $this->purchaseItems = $purchaseItems;
    }

    public function getStartingBalance($startDate)
    {
        $saleInvoiceItems = new Collection;
        $purchaseItems = new Collection;

        $startingBalance = 0;

        $openingStockTimestamp = $this->product->opening_stock_timestamp;
        $openingStockDate = substr($openingStockTimestamp, 0, 10);

        /* Get all the sale items */
        if ($this->product->subProducts && count($this->product->subProducts) > 0) {
            foreach ($this->product->subProducts as $product) {
                $items = $product->saleInvoiceItems()
                    ->whereHas('saleInvoice',
                        function (Builder $query)
                          use($openingStockTimestamp, $startDate, $openingStockDate) {
                        $query->where('created_at', '>=', $openingStockTimestamp)
                            ->where('sale_invoice_date', '>=', $openingStockDate)
                            ->where('sale_invoice_date', '<', $startDate);
                    })->get();
                $saleInvoiceItems = $saleInvoiceItems->merge($items);
            }
        } else {
            $saleInvoiceItems = $this->product->saleInvoiceItems()
                ->whereHas('saleInvoice',
                    function (Builder $query)
                      use($openingStockTimestamp, $startDate, $openingStockDate) {
                        $query->where('created_at', '>', $openingStockTimestamp)
                            ->where('sale_invoice_date', '>=', $openingStockDate)
                            ->where('sale_invoice_date', '<', $startDate);
                })->get();
        }


        /* Get all the purchase items */
        if ($this->product->subProducts && count($this->product->subProducts) > 0) {
            foreach ($this->product->subProducts as $product) {
                $items = $product->purchaseItems()
                    ->whereHas('purchase',
                        function (Builder $query)
                          use($openingStockTimestamp, $startDate, $openingStockDate) {
                            $query->where('created_at', '>', $openingStockTimestamp)
                                ->where('purchase_date', '>=', $openingStockDate)
                                ->where('purchase_date', '<', $startDate);
                    })->get();
                $purchaseItems = $purchaseItems->merge($items);
            }
        } else {
            $purchaseItems = $this->product->purchaseItems()
                ->whereHas('purchase',
                    function (Builder $query)
                      use($openingStockTimestamp, $startDate, $openingStockDate) {
                        $query->where('created_at', '>', $openingStockTimestamp)
                            ->where('purchase_date', '>=', $openingStockDate)
                            ->where('purchase_date', '<', $startDate);
                })->get();
        }

        $startingBalance = $this->product->opening_stock_count;

        /*
         * For all outItems and InItems after openingStockTimestamp
         * untill the startDate
         *     Add inItems
         *     Subtract outItems
         *
         */
        
        /* Add all purchases */
        foreach ($purchaseItems as $purchaseItem)  {
            /* Todo: For ml product? */
            $startingBalance += $purchaseItem->quantity * $purchaseItem->product->inventory_unit_consumption;
        }

        /* Subtract all sales */
        foreach ($saleInvoiceItems as $saleInvoiceItem)  {
            /* Todo: For ml product? */
            $startingBalance -= $saleInvoiceItem->quantity * $saleInvoiceItem->product->inventory_unit_consumption;
        }

        return $startingBalance;
    }

    public function arrangeItems()
    {
        //
    }
}

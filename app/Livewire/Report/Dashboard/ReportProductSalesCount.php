<?php

namespace App\Livewire\Report\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Models\SaleInvoice\SaleInvoice;
use App\Models\SaleInvoice\SaleInvoiceItem;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;

class ReportProductSalesCount extends Component
{
    public $startDate = null;
    public $endDate = null;

    public $todayItems = array();

    public $productCategories;
    public $products;

    public $search_product_category_id;
    public $search_product_id;

    public function mount(): void
    {
        $this->productCategories = ProductCategory::all();
        $this->products = Product::all(); 

        $this->startDate = date('Y-m-d');
    }

    public function render(): View
    {
        return view('livewire.report.dashboard.report-product-sales-count');
    }

    public function getSaleItemQuantity($saleInvoices): void
    {
        $this->todayItems = array();

        foreach ($saleInvoices as $saleInvoice) {
            foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
                if ($this->itemInTodayItems($saleInvoiceItem->product)) {
                    $this->updateTodayItemsCount($saleInvoiceItem);
                } else {
                    $this->addToTodayItemsCount($saleInvoiceItem);
                }
            }
        }

        usort($this->todayItems, function ($a, $b) {
            if ($b['quantity'] < $a['quantity']) {
                return -1;
            } else if ($b['quantity'] == $a['quantity']) {
                return 0;
            } else {
                return 1;
            }
        });
    }

    public function getSaleInvoiceItemQuantity($saleInvoiceItems): void
    {
        $this->todayItems = array();

        foreach ($saleInvoiceItems as $saleInvoiceItem) {
            if ($this->itemInTodayItems($saleInvoiceItem->product)) {
                $this->updateTodayItemsCount($saleInvoiceItem);
            } else {
                $this->addToTodayItemsCount($saleInvoiceItem);
            }
        }

        usort($this->todayItems, function ($a, $b) {
            if ($b['quantity'] < $a['quantity']) {
                return -1;
            } else if ($b['quantity'] == $a['quantity']) {
                return 0;
            } else {
                return 1;
            }
        });
    }

    public function itemInTodayItems(Product $product): bool
    {
        foreach ($this->todayItems as $item) {
            if ($item['product']->product_id == $product->product_id) {
                return true;
            }
        }

        return false;
    }

    public function updateTodayItemsCount(SaleInvoiceItem $saleInvoiceItem): void
    {
        for ($i=0; $i < count($this->todayItems); $i++) {
            if ($this->todayItems[$i]['product']->product_id == $saleInvoiceItem->product->product_id) {
                $this->todayItems[$i]['quantity'] += $saleInvoiceItem->quantity;
                break;
            }
        }
    }

    public function addToTodayItemsCount(SaleInvoiceItem $saleInvoiceItem): void
    {
        $line = array();

        $line['product'] = $saleInvoiceItem->product;
        $line['quantity'] = $saleInvoiceItem->quantity;

        $this->todayItems[] = $line;
    }

    public function getSaleInvoicesForDateRange() // TODO: Type hinting of return type
    {
        /* Todo: Validation */
        $validatedData = $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'nullable|date',
        ]);

        /*
         * Todo: Validate that endDate is not smaller than startDate
         *
         * Well, below is a simple validation.
         *
         * TOdo: Need to do in livewire / laravel specific way.
         *
         */

        if ($validatedData['endDate']) {
            if (! $validatedData['startDate']) {
                return;
            }

            if ($validatedData['startDate'] > $validatedData['endDate']) {
                return;
            }
        }

        if ($validatedData['endDate']) {
            $saleInvoices = SaleInvoice::whereDate('created_at', '>=', $validatedData['startDate'])
                ->whereDate('created_at', '<=', $validatedData['endDate'])
                ->orderBy('sale_invoice_id', 'desc')
                ->get();
        } else {
            $saleInvoices = SaleInvoice::whereDate('created_at', $validatedData['startDate'])
                ->orderBy('sale_invoice_id', 'desc')
                ->get();
        }

        return $saleInvoices;
    }

    public function getCount(): void
    {
        if (!$this->endDate) {
            $this->endDate = $this->startDate;
        }

        if ($this->search_product_id) {
            /* Get for specific product */
            $saleInvoiceItems = SaleInvoiceItem::where('product_id', $this->search_product_id)
                ->whereDate('created_at', '>=', $this->startDate)
                ->whereDate('created_at', '<=', $this->endDate)
                ->get();
            $this->getSaleInvoiceItemQuantity($saleInvoiceItems);
        } else if ($this->search_product_category_id) {
            $saleInvoiceItems = new Collection;

            /* Get for specific product category */
            $productCategory = ProductCategory::find($this->search_product_category_id);
            $products = $productCategory->products;

            foreach ($products as $product) {
                $items = SaleInvoiceItem::where('product_id', $product->product_id)
                    ->whereDate('created_at', '>=', $this->startDate)
                    ->whereDate('created_at', '<=', $this->endDate)
                    ->get();
                $saleInvoiceItems = $saleInvoiceItems->merge($items);
            }

            $this->getSaleInvoiceItemQuantity($saleInvoiceItems);
        } else {
            /* Get for all products */
            $saleInvoiceItems = SaleInvoiceItem::whereDate('created_at', '>=', $this->startDate)
                ->whereDate('created_at', '<=', $this->endDate)
                ->get();
            $this->getSaleInvoiceItemQuantity($saleInvoiceItems);
        }
    }

    public function updateProducts(): void
    {
        /* Todo: Fix this! This line should be removed */
        $this->todayItems = array();
        $this->products = Product::where('product_category_id', $this->search_product_category_id)->get();
    }
}

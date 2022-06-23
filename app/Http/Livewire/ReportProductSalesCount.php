<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use App\SaleInvoice;
use App\SaleInvoiceItem;
use App\Product;

class ReportProductSalesCount extends Component
{
    public $startDate = null;
    public $endDate = null;

    public $todayItems = array();

    public function mount()
    {
        $this->startDate = date('Y-m-d');
    }

    public function render()
    {
        $saleInvoices = $this->getSaleInvoicesForDateRange();

        $this->getSaleItemQuantity($saleInvoices);

        return view('livewire.report-product-sales-count');
    }

    public function getSaleItemQuantity($saleInvoices)
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

    public function itemInTodayItems(Product $product)
    {
        foreach ($this->todayItems as $item) {
            if ($item['product']->product_id == $product->product_id) {
                return true;
            }
        }

        return false;
    }

    public function updateTodayItemsCount(SaleInvoiceItem $saleInvoiceItem)
    {
        for ($i=0; $i < count($this->todayItems); $i++) {
            if ($this->todayItems[$i]['product']->product_id == $saleInvoiceItem->product->product_id) {
                $this->todayItems[$i]['quantity'] += $saleInvoiceItem->quantity;
                break;
            }
        }
    }

    public function addToTodayItemsCount(SaleInvoiceItem $saleInvoiceItem)
    {
        $line = array();

        $line['product'] = $saleInvoiceItem->product;
        $line['quantity'] = $saleInvoiceItem->quantity;

        $this->todayItems[] = $line;
    }

    public function getSaleInvoicesForDateRange()
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
}

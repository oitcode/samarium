<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;

use App\SaleInvoice;
use App\SaleInvoiceItem;
use App\Product;

class TableTopSellingProductsDay extends Component
{
    public $todayItems = array();

    public function render()
    {
        $saleInvoices = SaleInvoice::where('sale_invoice_date', date('Y-m-d'))
            ->orderBy('sale_invoice_id', 'desc')->paginate(100);

        $this->getSaleItemQuantity($saleInvoices);

        return view('livewire.report.table-top-selling-products-day');
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
}

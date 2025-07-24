<?php

namespace App\Livewire\Chart\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\SaleInvoice\SaleInvoice;
use App\Models\SaleInvoice\SaleInvoiceItem;
use App\Models\Product\ProductCategory;

class ChartSaleByCategory extends Component
{
    public $startDay;

    public $saleByCategory;

    public function mount(): void
    {
        $this->startDay = Carbon::now()->startOfWeek(Carbon::SUNDAY);
    }

    public function render(): View
    {
        $this->populateSaleByCategory();

        return view('livewire.chart.dashboard.chart-sale-by-category');
    }

    public function populateSaleByCategory(): void
    {
        $this->saleByCategory = array();

        $saleInvoices = SaleInvoice::whereDate('sale_invoice_date', '>=', $this->startDay)
            ->whereDate('sale_invoice_date', '<=', $this->startDay->copy()->addDays(6))
            ->get();

        foreach ($saleInvoices as $saleInvoice) {
            foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
                if ($this->categoryInSaleByCategory($saleInvoiceItem->product->productCategory)) {
                    $this->updateSaleByCategoryCount($saleInvoiceItem);
                } else {
                    $this->addToSaleByCategoryCount($saleInvoiceItem);
                }
            }
        }

        usort($this->saleByCategory, function ($a, $b) {
            if ($b['quantity'] < $a['quantity']) {
                return -1;
            } else if ($b['quantity'] == $a['quantity']) {
                return 0;
            } else {
                return 1;
            }
        });
    }

    public function categoryInSaleByCategory(ProductCategory $productCategory): bool
    {
        foreach ($this->saleByCategory as $item) {
            if ($item['productCategory']->product_category_id == $productCategory->product_category_id) {
                return true;
            }
        }

        return false;
    }

    public function updateSaleByCategoryCount(SaleInvoiceItem $saleInvoiceItem): void
    {
        for ($i=0; $i < count($this->saleByCategory); $i++) {
            if ($this->saleByCategory[$i]['productCategory']->product_category_id
              ==
              $saleInvoiceItem->product->productCategory->product_category_id) {
                $this->saleByCategory[$i]['quantity'] += $saleInvoiceItem->quantity;
                break;
            }
        }
    }

    public function addToSaleByCategoryCount(SaleInvoiceItem $saleInvoiceItem): void
    {
        $line = array();

        $line['productCategory'] = $saleInvoiceItem->product->productCategory;
        $line['quantity'] = $saleInvoiceItem->quantity;

        $this->saleByCategory[] = $line;
    }
}

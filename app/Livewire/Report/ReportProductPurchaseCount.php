<?php

namespace App\Livewire\Report;

use Livewire\Component;
use Carbon\Carbon;
use App\Purchase;
use App\PurchaseItem;
use App\Product;

class ReportProductPurchaseCount extends Component
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
        $purchases = $this->getPurchasesForDateRange();

        $this->getPurchaseItemQuantity($purchases);

        return view('livewire.report.report-product-purchase-count');
    }

    public function getPurchaseItemQuantity($purchases)
    {
        $this->todayItems = array();

        foreach ($purchases as $purchase) {
            foreach ($purchase->purchaseItems as $purchaseItem) {
                if ($this->itemInTodayItems($purchaseItem->product)) {
                    $this->updateTodayItemsCount($purchaseItem);
                } else {
                    $this->addToTodayItemsCount($purchaseItem);
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

    public function updateTodayItemsCount(PurchaseItem $purchaseItem)
    {
        for ($i=0; $i < count($this->todayItems); $i++) {
            if ($this->todayItems[$i]['product']->product_id == $purchaseItem->product->product_id) {
                $this->todayItems[$i]['quantity'] += $purchaseItem->quantity;
                break;
            }
        }
    }

    public function addToTodayItemsCount(PurchaseItem $purchaseItem)
    {
        $line = array();

        $line['product'] = $purchaseItem->product;
        $line['quantity'] = $purchaseItem->quantity;

        $this->todayItems[] = $line;
    }
    public function getPurchasesForDateRange()
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
            $purchases = Purchase::whereDate('created_at', '>=', $validatedData['startDate'])
                ->whereDate('created_at', '<=', $validatedData['endDate'])
                ->orderBy('purchase_id', 'desc')
                ->get();
        } else {
            $purchases = Purchase::whereDate('created_at', $validatedData['startDate'])
                ->orderBy('purchase_id', 'desc')
                ->get();
        }

        return $purchases;
    }
}

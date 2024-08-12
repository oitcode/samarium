<?php

namespace App\Livewire\Purchase;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Purchase;

class PurchaseListPurchaseDeleteConfirm extends Component
{
    public $purchase;

    public function render()
    {
        return view('livewire.purchase.purchase-list-purchase-delete-confirm');
    }

    public function deletePurchase(Purchase $purchase)
    {
        DB::beginTransaction();

        try {
            /* Delete purchase items */
            foreach ($purchase->purchaseItems as $item) {
                $quantity = $item->quantity;
                $product = $item->product;

                /* Delete purchase item */
                $item->delete();

                /* Update stock_count for product */
                $this->updateInventory($product, $quantity, 'out');
            }

            /* Delete purchase additions */
            foreach ($purchase->purchaseAdditions as $purchaseAddition) {
                $purchaseAddition->delete();
            }

            /* Delete purchase payments */
            foreach ($purchase->purchasePayments as $purchasePayment) {
                $purchasePayment->delete();
            }

            /* Delete purchase */
            $purchase->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->dispatch('purchaseDeleted');
    }

    public function updateInventory($product, $quantity, $direction)
    {
        if ($product->baseProduct) {
            $baseProduct = $product->baseProduct;
            $diffQty = $product->inventory_unit_consumption * $quantity;

            if ($direction == 'in') {
                $baseProduct->stock_count += $diffQty;
            } else if ($direction == 'out') {
                $baseProduct->stock_count -= $diffQty;
            } else {
                dd('Whoops! Inventory update gone wrong!');
            }

            $baseProduct->save();
        } else {
            if ($direction == 'in') {
                $product->stock_count += $quantity; 
            } else if ($direction == 'out') {
                $product->stock_count -= $quantity; 
            } else {
                dd('Whoops! Inventory update gone wrong!');
            }

            $product->save();
        }
    }
}

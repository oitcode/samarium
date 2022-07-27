<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Purchase;

class PurchaseListPurchaseDeleteConfirm extends Component
{
    public $purchase;

    public function render()
    {
        return view('livewire.purchase-list-purchase-delete-confirm');
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
                if ($product->stock_count) {
                    $product->stock_count += $quantity;
                    $product->save();
                }
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

        $this->emit('purchaseDeleted');
    }

}

<?php

namespace App\Livewire\Purchase\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\PurchaseItem;

class PurchaseCreateConfirmPurchaseItemDelete extends Component
{
    public $purchaseItem;

    public function render(): View
    {
        return view('livewire.purchase.dashboard.purchase-create-confirm-purchase-item-delete');
    }

    public function deletePurchaseItem(PurchaseItem $purchaseItem): void
    {
        $product = $purchaseItem->product;
        $quantity = $purchaseItem->quantity;

        $purchaseItem->delete();

        /* Do inventory update */
        $this->updateInventory($product, $quantity, 'out');

        $this->dispatch('purchaseItemDeleted');
    }

    public function updateInventory($product, $quantity, $direction): void
    {
        if ($product->baseProduct) {
            $baseProduct = $product->baseProduct;
            $diffQty = $product->inventory_unit_consumption * $quantity;

            if ($direction == 'in') {
                $baseProduct->stock_count += $diffQty;
            } else if ($direction == 'out') {
                $baseProduct->stock_count -= $diffQty;
            } else {
                // Todo
            }

            $baseProduct->save();
        } else {
            if ($direction == 'in') {
                $product->stock_count += $quantity; 
            } else if ($direction == 'out') {
                $product->stock_count -= $quantity; 
            } else {
                // Todo
            }

            $product->save();
        }
    }
}

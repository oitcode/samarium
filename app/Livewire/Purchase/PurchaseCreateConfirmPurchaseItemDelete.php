<?php

namespace App\Livewire\Purchase;

use Livewire\Component;

use App\PurchaseItem;

class PurchaseCreateConfirmPurchaseItemDelete extends Component
{
    public $purchaseItem;

    public function render()
    {
        return view('livewire.purchase.purchase-create-confirm-purchase-item-delete');
    }

    public function deletePurchaseItem(PurchaseItem $purchaseItem)
    {
        $product = $purchaseItem->product;
        $quantity = $purchaseItem->quantity;

        $purchaseItem->delete();

        /* Do inventory update */
        $this->updateInventory($product, $quantity, 'out');

        $this->dispatch('purchaseItemDeleted');
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

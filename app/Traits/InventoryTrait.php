<?php

namespace App\Traits;

trait InventoryTrait
{
    public function stockAvailable($product, $quantity)
    {
        if ($product->baseProduct) {
            if ($product->baseProduct->stock_count >= $quantity * $product->inventory_unit_consumption ) {
                return true;
            } else {
                session()->flash('errorMessage', 'Sorry! Stock not available.');
                return false;
            }
        } else {
            if ($product->stock_count >= $quantity ) {
                return true;
            } else {
                session()->flash('errorMessage', 'Sorry! Stock not available.');
                return false;
            }
        }
    }

    public function doInventoryUpdate($product, $quantity, $direction)
    {
        if ($product->baseProduct) {
            $baseProduct = $product->baseProduct;

            if ($direction == 'out') {
                $baseProduct->stock_count -= $quantity * $product->inventory_unit_consumption;
            } else {
                $baseProduct->stock_count += $quantity * $product->inventory_unit_consumption;
            }
            $baseProduct->save();
        } else {
            if (! is_null($product->stock_count)) {
                if ($direction == 'out') {
                    $product->stock_count -=  $quantity;
                } else {
                    $product->stock_count +=  $quantity;
                }
                $product->save();
            }
        }
    }
}

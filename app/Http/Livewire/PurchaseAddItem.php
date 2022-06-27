<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;
use App\ProductCategory;
use App\PurchaseItem;
use App\Purchase;

class PurchaseAddItem extends Component
{
    public $purchase;

    /* Search options */
    public $add_item_name;
    public $search_product_category_id;

    /* Products and Categories */
    public $products;
    public $productCategories;

    public $product_id;
    public $quantity;
    public $price;
    public $unit;
    public $purchase_price_per_unit;
    public $total;

    public $selectedProduct = null;

    public $modes = [
        'showMobForm' => false,
    ];


    public function mount()
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')->get();
    }

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.purchase-add-item');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function addItemToPurchase()
    {
        if (! $this->selectedProduct) {
            return;
        }

        /*
         * If same product added before just increase the count.
         * Else, create a new sale invoice item.
         *
         */

        $purchaseItem = $this->checkExistingItemsForProduct($this->purchase, $this->product_id);

        if ($purchaseItem) {
            /* Update existing sale invoice item. */
            $purchaseItem->quantity += $this->quantity;
            $purchaseItem->save();

            $this->updatePurchaseTotalAmount($this->purchase, $purchaseItem, $this->quantity);
        } else {
            /* Add purchase_item to purchase */
            $purchaseItem = new PurchaseItem;

            $purchaseItem->purchase_id = $this->purchase->purchase_id;
            $purchaseItem->product_id = $this->product_id;
            $purchaseItem->quantity = $this->quantity;
            $purchaseItem->unit = $this->unit;
            $purchaseItem->purchase_price_per_unit = $this->purchase_price_per_unit;
            $purchaseItem->purchase_price_total = $this->quantity * $this->purchase_price_per_unit;

            $purchaseItem->save();

            /* Update purchase total amount. */
            // TODO
        }

        /* Do inventory management */
        $product = Product::find($this->product_id);

        if (! is_null($product->stock_count)) {
          $product->stock_count +=  $this->quantity;
          $product->save();
        }

        $this->resetInputFields();
        $this->emit('itemAddedToPurchase');

        if ($this->modes['showMobForm']) {
            $this->exitMode('showMobForm');
        }
    }

    public function updateProductList()
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')->get();
    }

    public function selectItem()
    {
        $product = Product::find($this->product_id);

        $this->price = $product->selling_price;
        $this->quantity = 1;
        if ($this->purchase_price_per_unit) {
            $this->total = $this->purchase_price_per_unit * $this->quantity;
        }

        $this->selectedProduct = $product;
    }

    public function resetInputFields()
    {
        $this->add_item_name = '';
        $this->product_id = '';
        $this->quantity = '';
        $this->price = '';
        $this->purchase_price_per_unit = '';
        $this->unit = '';
        $this->total = null;

        $this->selectedProduct = null;
        $this->search_product_category_id = null;

        $this->products = Product::all();
    }

    public function updateTotal()
    {
        $this->total = $this->purchase_price_per_unit * $this->quantity;
    }

    public function selectProductCategory()
    {
        $validatedData = $this->validate([
            'search_product_category_id' => 'required|integer',
        ]);

        $this->selectedProduct = null;
        $this->quantity = '';

        $this->products = ProductCategory::find($validatedData['search_product_category_id'])->products;
    }

    public function checkExistingItemsForProduct($purchase, $productId)
    {
        foreach ($purchase->purchaseItems as $purchaseItem) {
            if ($purchaseItem->product_id == $productId) {
                return $purchaseItem;
            }
        }

        return null;
    }

    public function updatePurchaseTotalAmount($purchase, $purchaseItem, $quantity)
    {
        $product = $purchaseItem->product;

        $purchase->save();
    }

    public function showAddItemFormMob()
    {
        $this->enterMode('showMobForm');
    }

    public function hideAddItemFormMob()
    {
        $this->exitMode('showMobForm');
    }
}

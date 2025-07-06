<?php

namespace App\Livewire\Purchase\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Purchase\PurchaseItem;
use App\Models\Purchase\Purchase;

class PurchaseEditorAddItem extends Component
{
    use ModesTrait;
    
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

    public function mount(): void
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')->get();
    }

    public function render(): View
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.purchase.dashboard.purchase-editor-add-item');
    }

    public function addItemToPurchase(): void
    {
        /* Todo: Validation */
        if (! $this->selectedProduct) {
            return;
        }

        $validatedData = $this->validate([
            'unit' => 'required',
            'purchase_price_per_unit' => 'required',
        ]);

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

            $this->updatePurchaseItemTotalAmount($this->purchase, $purchaseItem, $this->quantity);
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

        $this->doInventoryUpdate($product, $this->quantity, 'in');

        $this->resetInputFields();
        $this->dispatch('itemAddedToPurchase');

        if ($this->modes['showMobForm']) {
            $this->exitMode('showMobForm');
        }
    }

    public function updateProductList(): void
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')->get();
    }

    public function selectItem(): void
    {
        $product = Product::find($this->product_id);

        $this->price = $product->selling_price;
        $this->quantity = 1;
        if ($this->purchase_price_per_unit) {
            $this->total = $this->purchase_price_per_unit * $this->quantity;
        }

        $this->selectedProduct = $product;
    }

    public function resetInputFields(): void
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

    public function updateTotal(): void
    {
        $this->total = $this->purchase_price_per_unit * $this->quantity;
    }

    public function selectProductCategory(): void
    {
        $validatedData = $this->validate([
            'search_product_category_id' => 'required|integer',
        ]);

        $this->selectedProduct = null;
        $this->quantity = '';

        $this->products = ProductCategory::find($validatedData['search_product_category_id'])->products;
    }

    public function checkExistingItemsForProduct($purchase, $productId): PurchaseItem|null
    {
        foreach ($purchase->purchaseItems as $purchaseItem) {
            if ($purchaseItem->product_id == $productId) {
                return $purchaseItem;
            }
        }

        return null;
    }

    public function updatePurchaseItemTotalAmount($purchase, $purchaseItem, $quantity): void
    {
        $product = $purchaseItem->product;

        $purchaseItem->purchase_price_total += $purchaseItem->purchase_price_per_unit * $quantity;
        $purchaseItem->save();
    }

    public function showAddItemFormMob(): void
    {
        $this->enterMode('showMobForm');
    }

    public function hideAddItemFormMob(): void
    {
        $this->exitMode('showMobForm');
    }

    public function doInventoryUpdate($product, $quantity, $direction): void
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

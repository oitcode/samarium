<?php

namespace App\Livewire\SaleInvoice\Dashboard;

use App\Traits\ModesTrait;
use Illuminate\View\View;
use App\Traits\InventoryTrait;
use Livewire\Component;
use App\Product;
use App\ProductCategory;
use App\SaleInvoiceItem;
use App\Takeaway;

class SaleInvoiceWorkAddItem extends Component
{
    use ModesTrait;
    use InventoryTrait;

    public $saleInvoice;

    /* Search options */
    public $add_item_name;
    public $search_product_category_id;

    /* Products and Categories */
    public $products;
    public $productCategories;

    public $product_id;
    public $quantity;
    public $price;
    public $total;

    public $selectedProduct = null;

    public $modes = [
        'showMobForm' => false,
        'productSelected' => false,
    ];


    public function mount(): void
    {
        // $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')
        //     ->where('is_base_product', false)
        //     ->orderBy('name', 'ASC')
        //     ->get();
    }

    public function render(): View
    {
        $this->productCategories = ProductCategory::where('does_sell', 'yes')
            ->orderBy('name', 'ASC')
            ->get();

        return view('livewire.sale-invoice.dashboard.sale-invoice-work-add-item');
    }

    public function addItemToSaleInvoice(): void
    {
        if (! $this->selectedProduct) {
            return;
        }

        /* Check if enough stock/inventory is available. */
        if ($this->selectedProduct->stock_applicable == 'yes') {
          if (! $this->stockAvailable($this->selectedProduct, $this->quantity)) {
              return;
          }
        }

        /*
         * If same product added before just increase the count.
         * Else, create a new sale invoice item.
         *
         */

        $saleInvoiceItem = $this->checkExistingItemsForProduct($this->saleInvoice, $this->product_id);

        if ($saleInvoiceItem) {
            /* Update existing sale invoice item. */
            $saleInvoiceItem->quantity += $this->quantity;
            $saleInvoiceItem->save();

            $this->updateSaleInvoiceTotalAmount($this->saleInvoice, $saleInvoiceItem, $this->quantity);
        } else {
            /* Add sale_invoice_item to sale_invoice */
            $saleInvoiceItem = new SaleInvoiceItem;

            $saleInvoiceItem->sale_invoice_id = $this->saleInvoice->sale_invoice_id;
            $saleInvoiceItem->product_id = $this->product_id;
            $saleInvoiceItem->quantity = $this->quantity;
            $saleInvoiceItem->price_per_unit = Product::find($this->product_id)->selling_price;

            $saleInvoiceItem->save();

            /* Update sale_invoice total amount. */
            $saleInvoice = $this->saleInvoice;
            $saleInvoice->total_amount += $saleInvoiceItem->getTotalAmount();
            $saleInvoice->save();
        }

        /* Do inventory management */
        $product = Product::find($this->product_id);

        $this->doInventoryUpdate($product, $this->quantity, 'out');

        $this->resetInputFields();
        $this->dispatch('itemAddedToSaleInvoice');

        if ($this->modes['showMobForm']) {
            $this->exitMode('showMobForm');
        }
    }

    public function updateProductList(): void
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')
            ->where('is_base_product', false)
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function selectItem(): void
    {
        $product = Product::find($this->product_id);

        $this->price = $product->selling_price;
        $this->quantity = 1;
        $this->total = $this->price * $this->quantity;

        $this->selectedProduct = $product;
    }

    public function resetInputFields(): void
    {
        $this->add_item_name = '';
        $this->product_id = '';
        $this->quantity = '';
        $this->price = '';
        $this->total = null;

        $this->products = null;
        $this->selectedProduct = null;
        $this->search_product_category_id = null;

        $this->exitMode('productSelected');

        // $this->products = Product::all();
    }

    public function updateTotal(): void
    {
        $this->total = $this->selectedProduct->selling_price * $this->quantity;
    }

    public function selectProductCategory(): void
    {
        $validatedData = $this->validate([
            'search_product_category_id' => 'required|integer',
        ]);

        $this->selectedProduct = null;
        $this->quantity = '';

        $this->products =
            ProductCategory::find($validatedData['search_product_category_id'])
                ->products()->where('is_base_product', false)
                ->orderBy('name', 'ASC')
                ->get();
    }

    public function checkExistingItemsForProduct($saleInvoice, $productId): SaleInvoiceItem|null
    {
        foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
            if ($saleInvoiceItem->product_id == $productId) {
                return $saleInvoiceItem;
            }
        }

        return null;
    }

    public function updateSaleInvoiceTotalAmount($saleInvoice, $saleInvoiceItem, $quantity): void
    {
        $product = $saleInvoiceItem->product;

        $saleInvoice->total_amount += $product->selling_price * $quantity;
        $saleInvoice->save();
    }

    public function showAddItemFormMob(): void
    {
        $this->enterMode('showMobForm');
    }

    public function hideAddItemFormMob(): void
    {
        $this->exitMode('showMobForm');
    }

    public function selectItemNew(Product $product): void
    {
        $this->product_id = $product->product_id;
        $this->selectedProduct = $product;
        $this->enterMode('productSelected');
        // $this->quantity = 1;
        // $this->price_per_unit = $this->selectedProduct->selling_price;;

        // $this->addItemToSaleInvoice();
    }
}

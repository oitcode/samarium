<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;
use App\ProductCategory;
use App\SaleInvoiceItem;
use App\Takeaway;

class TakeawayWorkAddItem extends Component
{
    public $takeaway;

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


    public function mount()
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')->get();
    }

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.takeaway-work-add-item');
    }

    public function addItemToTakeaway()
    {
        if (! $this->selectedProduct) {
            return;
        }

        /*
         * If same product added before just increase the count.
         * Else, create a new sale invoice item.
         *
         */

        $saleInvoiceItem = $this->checkExistingItemsForProduct($this->takeaway->saleInvoice, $this->product_id);

        if ($saleInvoiceItem) {
            /* Update existing sale invoice item. */
            $saleInvoiceItem->quantity += $this->quantity;
            $saleInvoiceItem->save();

            $this->updateSaleInvoiceTotalAmount($this->takeaway->saleInvoice, $saleInvoiceItem, $this->quantity);
        } else {
            /* Add sale_invoice_item to sale_invoice */
            $saleInvoiceItem = new SaleInvoiceItem;

            $saleInvoiceItem->sale_invoice_id = $this->takeaway->saleInvoice->sale_invoice_id;
            $saleInvoiceItem->product_id = $this->product_id;
            $saleInvoiceItem->quantity = $this->quantity;

            $saleInvoiceItem->save();

            /* Update sale_invoice total amount. */
            $saleInvoice = $this->takeaway->saleInvoice;
            $saleInvoice->total_amount += $saleInvoiceItem->getTotalAmount();
            $saleInvoice->save();
        }

        /* Do inventory management */
        $product = Product::find($this->product_id);

        if ($product->stock_count != null) {
          $product->stock_count -=  $this->quantity;
          $product->save();
        }

        $this->resetInputFields();
        $this->emit('itemAddedToTakeaway');
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
        $this->total = $this->price * $this->quantity;

        $this->selectedProduct = $product;
    }

    public function resetInputFields()
    {
        $this->add_item_name = '';
        $this->product_id = '';
        $this->quantity = '';
        $this->price = '';
        $this->total = null;

        $this->selectedProduct = null;
        $this->search_product_category_id = null;

        $this->products = Product::all();
    }

    public function updateTotal()
    {
        $this->total = $this->price * $this->quantity;
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

    public function checkExistingItemsForProduct($saleInvoice, $productId)
    {
        foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
            if ($saleInvoiceItem->product_id == $productId) {
                return $saleInvoiceItem;
            }
        }

        return null;
    }

    public function updateSaleInvoiceTotalAmount($saleInvoice, $saleInvoiceItem, $quantity)
    {
        $product = $saleInvoiceItem->product;

        $saleInvoice->total_amount += $product->selling_price * $quantity;
        $saleInvoice->save();
    }
}

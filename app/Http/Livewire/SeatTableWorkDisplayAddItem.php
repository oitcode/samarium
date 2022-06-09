<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;
use App\ProductCategory;
use App\SeatTableBooking;
use App\SeatTableBookingItem;
use App\SaleInvoiceItem;

class SeatTableWorkDisplayAddItem extends Component
{
    public $seat_table_booking_id;

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
    ];


    public function mount()
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')->get();
    }

    public function render()
    {
        $this->productCategories = ProductCategory::where('does_sell', 'yes')->get();

        return view('livewire.seat-table-work-display-add-item');
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

    public function addItemToSeatTableBooking()
    {
        if (! $this->selectedProduct) {
            return;
        }

        /*
         *
         *
         *
         *
         For sale invoie
         *
         *
         *
         */

        /* Get sale_invoice */
        $seatTableBooking = SeatTableBooking::find($this->seat_table_booking_id);
        $saleInvoice = $seatTableBooking->saleInvoice;


        /*
         * If same product added before just increase the count.
         * Else, create a new sale invoice item.
         *
         */

        $saleInvoiceItem = $this->checkExistingItemsForProduct($saleInvoice, $this->product_id);

        if ($saleInvoiceItem) {
            /* Update existing sale invoice item. */
            $saleInvoiceItem->quantity += $this->quantity;
            $saleInvoiceItem->save();

            $this->updateSaleInvoiceTotalAmount($saleInvoice, $saleInvoiceItem, $this->quantity);
        } else {
            /* Add sale_invoice_item to sale_invoice */
            $saleInvoiceItem = new SaleInvoiceItem;

            $saleInvoiceItem->sale_invoice_id = $saleInvoice->sale_invoice_id;
            $saleInvoiceItem->product_id = $this->product_id;
            $saleInvoiceItem->quantity = $this->quantity;
            $saleInvoiceItem->price_per_unit = Product::find($this->product_id)->selling_price;

            $saleInvoiceItem->save();

            /* Update sale_invoice total amount. */
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
        $this->emit('itemAddedToBooking');


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

    public function showAddItemFormMob()
    {
        $this->enterMode('showMobForm');
    }
}

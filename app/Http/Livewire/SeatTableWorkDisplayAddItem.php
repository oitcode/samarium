<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;
use App\SeatTableBooking;
use App\SeatTableBookingItem;
use App\SaleInvoiceItem;

class SeatTableWorkDisplayAddItem extends Component
{
    public $seat_table_booking_id;

    public $add_item_name;
    public $products;

    public $product_id;
    public $quantity;
    public $price;
    public $total;

    public $selectedProduct = null;

    public function render()
    {
        $this->products = Product::where('name', 'like', '%'.$this->add_item_name.'%')->get();

        return view('livewire.seat-table-work-display-add-item');
    }

    public function addItemToSeatTableBooking()
    {
        /*
        $seatTableBookingItem = new SeatTableBookingItem;

        $seatTableBookingItem->seat_table_booking_id = $this->seat_table_booking_id;
        $seatTableBookingItem->product_id = $this->product_id;
        $seatTableBookingItem->quantity = $this->quantity;

        $seatTableBookingItem->save();

        $product = Product::find($this->product_id);

        if ($product->stock_count != null) {
          $product->stock_count -=  $this->quantity;
          $product->save();
        }
        */


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

        /* Add sale_invoice_item to sale_invoice */
        $saleInvoiceItem = new SaleInvoiceItem;

        $saleInvoiceItem->sale_invoice_id = $saleInvoice->sale_invoice_id;
        $saleInvoiceItem->product_id = $this->product_id;
        $saleInvoiceItem->quantity = $this->quantity;

        $saleInvoiceItem->save();

        /* Update sale_invoice total amount. */
        $saleInvoice->total_amount += $saleInvoiceItem->getTotalAmount();
        $saleInvoice->save();

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
    }

    public function updateTotal()
    {
        $this->total = $this->price * $this->quantity;
    }
}

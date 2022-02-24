<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;
use App\SeatTableBookingItem;

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
        $seatTableBookingItem = new SeatTableBookingItem;

        $seatTableBookingItem->seat_table_booking_id = $this->seat_table_booking_id;
        $seatTableBookingItem->product_id = $this->product_id;
        $seatTableBookingItem->quantity = $this->quantity;

        $seatTableBookingItem->save();

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
        $this->product_id = '';
        $this->quantity = '';
        $this->price = '';
        $this->total = '';

        $this->selectedProduct = null;
    }

    public function updateTotal()
    {
        $this->total = $this->price * $this->quantity;
    }
}

<?php

namespace App\Http\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Product;
use App\WebsiteOrder;
use App\WebsiteOrderItem;

class Checkout extends Component
{
    public $cartItems;

    public $phone;
    public $address;
    public $cartTotalAmount;

    public function render()
    {
        $cartItemsProduct = array();

        if (session('cart')) {
            foreach ($this->cartItems as $key => $val) {
                $product = Product::findOrFail('' . $key);

                $foo = [
                    'product' => $product,
                    'quantity' => $val,
                ];

                $cartItemsProduct[] = $foo;
            }

            $this->cartTotalAmount = $this->calculateCartTotalAmount();

            return view('livewire.ecomm-website.checkout')
                ->with('cartItemsProduct' , $cartItemsProduct);
        } else {
            return view('livewire.ecomm-website.checkout');
        }
    }

    public function store()
    {
        $validatedData = $this->validate([
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'address' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $websiteOrder = new WebsiteOrder;

            $websiteOrder->phone = $validatedData['phone'];
            $websiteOrder->address = $validatedData['address'];

            $websiteOrder->save();

            foreach ($this->cartItems as $key => $val) {
                $websiteOrderItem = new WebsiteOrderItem;

                $websiteOrderItem->website_order_id = $websiteOrder->website_order_id;
                $websiteOrderItem->product_id = $key;
                $websiteOrderItem->quantity = $val;

                $websiteOrderItem->save();

                DB::commit();

                /* Destroy shopping cart in session. */
                session()->forget('cartItems');
                session()->forget('cart');

                session()->flash('message', 'Order received. We will call you!');
                $this->resetInputFields();
            }
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }

    public function resetInputFields()
    {
        $this->phone = '';
        $this->address = '';
    }

    public function calculateCartTotalAmount()
    {
        $total = 0;

        foreach ($this->cartItems as $key => $val) {
            $product = Product::findOrFail($key);
            $total += $product->selling_price * $val;
        }

        return $total;
    }
}

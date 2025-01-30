<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use App\Product;

class ProductListDisplay extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.ecomm-website.product-list-display');
    }

    public function addItemToCart($productId)
    {
        $product = Product::findOrFail($productId);

        if (! session('cart')) {
            session(['cart' => true,]);
            $cartItems = array();
            $cartItems['' . $product->product_id] = 1;
            session(['cartItems' => $cartItems,]);
        } else {
            $cartItems = session('cartItems');
            if (array_key_exists('' . $product->product_id, $cartItems)) {
                $cartItems['' . $product->product_id] += 1;
            } else {
                $cartItems['' . $product->product_id] = 1;
            }
            session(['cartItems' => $cartItems,]);
        }

        $this->dispatch('itemAddedToCart');
    }
}

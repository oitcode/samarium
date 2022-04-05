<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;

class WebsiteProductCategoryProductList extends Component
{
    public $productCategory;

    public function render()
    {
        return view('livewire.website-product-category-product-list');
    }

    public function addItemToCartB($productId)
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

        $this->emit('itemAddedToCart');
    }
}

<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use App\Traits\ModesTrait;
use App\Product;
use App\ProductCategory;

class ProductCategoryProductList extends Component
{
    use ModesTrait;

    public $productCategory;

    public $displayingSubProductCategory;

    public $modes = [
        'displaySubProductCategoryMode' => false,
    ];

    public function render()
    {
        return view('livewire.ecomm-website.product-category-product-list');
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

    public function displaySubProductCategory(ProductCategory $subProductCategory)
    {
        $this->displayingSubProductCategory = $subProductCategory;
        $this->enterMode('displaySubProductCategoryMode');
    }
}

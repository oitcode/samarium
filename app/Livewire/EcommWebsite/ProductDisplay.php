<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Product\Product;

class ProductDisplay extends Component
{
    use ModesTrait;

    public $product;

    public $modes = [
        'createProductReviewMode' => false,

        'createProductQuestionMode' => false,
    ];

    protected $listeners = [
        'createProductReviewCompleted',
        'createProductReviewCancelled',

        'createProductQuestionCompleted',
        'createProductQuestionCancelled',
    ];

    public function render(): View
    {
        return view('livewire.ecomm-website.product-display');
    }

    public function addItemToCart($productId): void
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

    public function createProductReviewCancelled(): void
    {
        $this->exitMode('createProductReviewMode');
    }

    public function createProductReviewCompleted(): void
    {
        $this->exitMode('createProductReviewMode');
    }

    public function createProductQuestionCancelled(): void
    {
        $this->exitMode('createProductQuestionMode');
    }

    public function createProductQuestionCompleted(): void
    {
        $this->exitMode('createProductQuestionMode');
    }
}

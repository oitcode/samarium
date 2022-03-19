<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;

class WebsiteShoppingCartBadge extends Component
{
    public $total;

    protected $listeners = [
        'itemAddedToCart' => 'render',
    ];

    public function render()
    {
        $total = 0;

        if (session('cart')) {
            $total = $this->getCartTotal();
        }

        $this->total = $total;

        return view('livewire.website-shopping-cart-badge');
    }

    public function getCartTotal()
    {
        $total = 0;

        if (session('cart')) {
            foreach (session('cartItems') as $key => $val) {
                $product = Product::findOrFail($key);

                $total += $product->selling_price * $val;
            }
        }

        return $total;
    }
}

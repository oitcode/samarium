<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Product;

class InventoryComponent extends Component
{
    public $products;

    public $displayingProduct;

    public $modes = [
        'productDetail' => false,
    ];

    public function render()
    {
        $this->products = Product::where('base_product_id', null)->get();

        return view('livewire.inventory-component');
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

    public function displayProductDetail(Product $product)
    {
        $this->displayingProduct = $product;

        $this->enterMode('productDetail');
    }
}

<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;

use App\Product;

use App\Traits\ModesTrait;

class InventoryComponent extends Component
{
    use ModesTrait;

    public $products;

    public $displayingProduct;

    public $modes = [
        'productDetail' => false,
        'productList' => false,
    ];

    public function render()
    {
        $this->products = Product::where('base_product_id', null)->get();

        return view('livewire.inventory.inventory-component');
    }

    public function displayProductDetail(Product $product)
    {
        $this->displayingProduct = $product;

        $this->enterMode('productDetail');
    }
}

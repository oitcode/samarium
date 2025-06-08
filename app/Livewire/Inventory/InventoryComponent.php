<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Product;

class InventoryComponent extends Component
{
    use ModesTrait;

    public $products;

    public $displayingProduct;

    public $modes = [
        'productDetail' => false,
        'productList' => false,
    ];

    public function render(): View
    {
        $this->products = Product::where('base_product_id', null)->where('stock_applicable', 'yes')->get();

        return view('livewire.inventory.inventory-component');
    }

    public function displayProductDetail(Product $product): void
    {
        $this->displayingProduct = $product;

        $this->enterMode('productDetail');
    }
}

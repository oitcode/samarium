<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use App\ProductOption;

class ProductEditAddProductOption extends Component
{
    public $product;

    public $product_option_name;
    public $product_option_heading_id;

    public $productOptionHeadings;

    public function render()
    {
        $this->productOptionHeadings = $this->product->productOptionHeadings;

        return view('livewire.product.dashboard.product-edit-add-product-option');
    }

    public function store()
    {
        $validatedData= $this->validate([
             'product_option_name' => 'required|string',
             'product_option_heading_id' => 'required|integer',
        ]);

        $productOption = new ProductOption;

        $productOption->product_id = $this->product->product_id;

        $productOption->product_option_name = $validatedData['product_option_name'];
        $productOption->product_option_heading_id = $validatedData['product_option_heading_id'];
        $productOption->position = $this->product->getLastSpecPosition() + 1;

        $productOption->save();

        $this->dispatch('productEditAddProductOptionModeCompleted');
    }
}

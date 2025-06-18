<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Product\ProductOptionHeading;

class ProductEditAddProductOptionHeading extends Component
{
    public $product;

    public $product_option_heading_name;

    public function render(): View
    {
        return view('livewire.product.dashboard.product-edit-add-product-option-heading');
    }

    public function store(): void
    {
        $validatedData= $this->validate([
             'product_option_heading_name' => 'required|string',
        ]);

        $productOptionHeading = new ProductOptionHeading;

        $productOptionHeading->product_id = $this->product->product_id;

        $productOptionHeading->position = $this->product->getLastSpecPosition() + 1;
        $productOptionHeading->product_option_heading_name = $validatedData['product_option_heading_name'];

        $productOptionHeading->save();

        $this->dispatch('productEditAddProductOptionHeadingModeCompleted');
    }
}

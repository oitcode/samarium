<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

use App\ProductSpecificationHeading;

class ProductEditAddProductSpecificationHeading extends Component
{
    public $product;

    public $specification_heading;

    public function render()
    {
        return view('livewire.product.dashboard.product-edit-add-product-specification-heading');
    }

    public function store()
    {
        $validatedData= $this->validate([
             'specification_heading' => 'required|string',
        ]);

        $productSpecificationHeading = new ProductSpecificationHeading;

        $productSpecificationHeading->product_id = $this->product->product_id;

        $productSpecificationHeading->position = $this->product->getLastSpecPosition() + 1;
        $productSpecificationHeading->specification_heading = $validatedData['specification_heading'];

        $productSpecificationHeading->save();

        $this->emit('productEditAddProductSpecificationHeadingModeCompleted');
    }
}

<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

use App\ProductSpecification;

class ProductEditAddProductSpecification extends Component
{
    public $product;

    public $keyword;
    public $value;

    public function render()
    {
        return view('livewire.product.dashboard.product-edit-add-product-specification');
    }

    public function store()
    {
        $validatedData= $this->validate([
             'keyword' => 'required|string',
             'value' => 'required|string',
        ]);

        $validatedData['spec_heading'] = $validatedData['keyword'];
        $validatedData['spec_valye'] = $validatedData['value'];

        $productSpecification = new ProductSpecification;

        $productSpecification->product_id = $this->product->product_id;

        $productSpecification->position = $this->product->getLastSpecPosition() + 1;
        $productSpecification->spec_heading = $validatedData['keyword'];
        $productSpecification->spec_value = $validatedData['value'];

        $productSpecification->save();

        $this->emit('productEditAddProductSpecificationModeCompleted');
    }
}

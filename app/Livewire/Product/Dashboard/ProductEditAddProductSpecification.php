<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Product\ProductSpecification;

class ProductEditAddProductSpecification extends Component
{
    public $product;

    public $keyword;
    public $value;
    public $product_specification_heading_id;

    public $productSpecificationHeadings;

    public function render(): View
    {
        $this->productSpecificationHeadings = $this->product->productSpecificationHeadings;

        return view('livewire.product.dashboard.product-edit-add-product-specification');
    }

    public function store(): void
    {
        $validatedData= $this->validate([
             'keyword' => 'required|string',
             'value' => 'required|string',
             'product_specification_heading_id' => 'nullable',
        ]);

        $validatedData['spec_heading'] = $validatedData['keyword'];
        $validatedData['spec_valye'] = $validatedData['value'];

        $productSpecification = new ProductSpecification;

        $productSpecification->product_id = $this->product->product_id;

        $productSpecification->position = $this->product->getLastSpecPosition() + 1;
        $productSpecification->spec_heading = $validatedData['keyword'];
        $productSpecification->spec_value = $validatedData['value'];

        if ($validatedData['product_specification_heading_id'] != '---') {
            $productSpecification->product_specification_heading_id = $validatedData['product_specification_heading_id'];
        }

        $productSpecification->save();

        $this->dispatch('productEditAddProductSpecificationModeCompleted');
    }
}

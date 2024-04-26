<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

use App\ProductFeature;

class ProductEditAddProductFeature extends Component
{
    public $product;

    public $feature;

    public function render()
    {
        return view('livewire.product.dashboard.product-edit-add-product-feature');
    }

    public function store()
    {
        $validatedData= $this->validate([
             'feature' => 'required|string',
        ]);

        $productFeature = new ProductFeature;

        $productFeature->product_id = $this->product->product_id;

        $productFeature->position = $this->product->getLastSpecPosition() + 1;
        $productFeature->feature = $validatedData['feature'];

        $productFeature->save();

        $this->emit('productEditAddProductFeatureModeCompleted');
    }
}

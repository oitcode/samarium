<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\ProductFeatureHeading;

class ProductEditAddProductFeatureHeading extends Component
{
    public $product;

    public $feature_heading;

    public function render(): View
    {
        return view('livewire.product.dashboard.product-edit-add-product-feature-heading');
    }

    public function store(): void
    {
        $validatedData= $this->validate([
             'feature_heading' => 'required|string',
        ]);

        $productFeatureHeading = new ProductFeatureHeading;

        $productFeatureHeading->product_id = $this->product->product_id;

        $productFeatureHeading->position = $this->product->getLastSpecPosition() + 1;
        $productFeatureHeading->feature_heading = $validatedData['feature_heading'];

        $productFeatureHeading->save();

        $this->dispatch('productEditAddProductFeatureHeadingModeCompleted');
    }
}

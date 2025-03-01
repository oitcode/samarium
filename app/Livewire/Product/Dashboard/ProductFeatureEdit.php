<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductFeatureEdit extends Component
{
    public $productFeature;

    public $feature;

    public function mount(): void
    {
        $this->feature = $this->productFeature->feature;
    }

    public function render(): View
    {
        return view('livewire.product.dashboard.product-feature-edit');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'feature' => 'required|string',
        ]);

        $this->productFeature->feature = $validatedData['feature'];
        $this->productFeature->save();

        $this->dispatch('productFeatureUpdateCompleted');
    }
}

<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

class ProductFeatureEdit extends Component
{
    public $productFeature;

    public $feature;

    public function mount()
    {
        $this->feature = $this->productFeature->feature;
    }

    public function render()
    {
        return view('livewire.product.dashboard.product-feature-edit');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'feature' => 'required|string',
        ]);

        $this->productFeature->feature = $validatedData['feature'];
        $this->productFeature->save();

        $this->emit('productFeatureUpdateCompleted');
    }
}

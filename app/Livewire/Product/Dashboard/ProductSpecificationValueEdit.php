<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductSpecificationValueEdit extends Component
{
    public $productSpecification;

    public $spec_value;

    public function mount(): void
    {
        $this->spec_value = $this->productSpecification->spec_value;
    }

    public function render(): View
    {
        return view('livewire.product.dashboard.product-specification-value-edit');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'spec_value' => 'required|string',
        ]);

        $this->productSpecification->spec_value = $validatedData['spec_value'];
        $this->productSpecification->save();

        $this->dispatch('productSpecificationUpdateValueCompleted');
    }
}

<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

class ProductSpecificationValueEdit extends Component
{
    public $productSpecification;

    public $spec_value;

    public function mount()
    {
        $this->spec_value = $this->productSpecification->spec_value;
    }

    public function render()
    {
        return view('livewire.product.dashboard.product-specification-value-edit');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'spec_value' => 'required|string',
        ]);

        $this->productSpecification->spec_value = $validatedData['spec_value'];
        $this->productSpecification->save();

        $this->emit('productSpecificationUpdateValueCompleted');
    }
}

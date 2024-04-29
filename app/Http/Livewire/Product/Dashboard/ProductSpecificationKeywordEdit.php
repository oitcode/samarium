<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

class ProductSpecificationKeywordEdit extends Component
{
    public $productSpecification;

    public $spec_heading;

    public function mount()
    {
        $this->spec_heading = $this->productSpecification->spec_heading;
    }

    public function render()
    {
        return view('livewire.product.dashboard.product-specification-keyword-edit');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'spec_heading' => 'required|string',
        ]);

        $this->productSpecification->spec_heading = $validatedData['spec_heading'];
        $this->productSpecification->save();

        $this->emit('productSpecificationUpdateKeywordCompleted');
    }
}

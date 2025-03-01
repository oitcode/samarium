<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductSpecificationKeywordEdit extends Component
{
    public $productSpecification;

    public $spec_heading;

    public function mount(): void
    {
        $this->spec_heading = $this->productSpecification->spec_heading;
    }

    public function render(): View
    {
        return view('livewire.product.dashboard.product-specification-keyword-edit');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'spec_heading' => 'required|string',
        ]);

        $this->productSpecification->spec_heading = $validatedData['spec_heading'];
        $this->productSpecification->save();

        $this->dispatch('productSpecificationUpdateKeywordCompleted');
    }
}

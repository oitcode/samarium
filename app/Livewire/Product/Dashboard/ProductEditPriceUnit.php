<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductEditPriceUnit extends Component
{
    public $product;

    public $selling_price_unit;

    public function mount(): void
    {
        $this->selling_price_unit = $this->product->selling_price_unit;
    }

    public function render(): View
    {
        return view('livewire.product.dashboard.product-edit-price-unit');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'selling_price_unit' => 'required',
        ]);

        $this->product->selling_price_unit = $validatedData['selling_price_unit'];
        $this->product->save();
        $this->dispatch('productUpdatePriceUnitCompleted');
    }
}

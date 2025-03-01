<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductEditPrice extends Component
{
    public $product;

    public $price;

    public function mount(): void
    {
        $this->price = $this->product->selling_price;
    }

    public function render(): View
    {
        return view('livewire.product.dashboard.product-edit-price');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'price' => 'required|integer',
        ]);

        $this->product->selling_price = $validatedData['price'];
        $this->product->save();
        $this->dispatch('productUpdatePriceCompleted');
    }
}

<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class ProductEditName extends Component
{
    public $product;

    public $name;

    public function mount(): void
    {
        $this->name = $this->product->name;
    }

    public function render(): View
    {
        return view('livewire.product.dashboard.product-edit-name');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->product->name = $validatedData['name'];
        $this->product->save();
        $this->dispatch('productUpdateNameCompleted');
    }
}

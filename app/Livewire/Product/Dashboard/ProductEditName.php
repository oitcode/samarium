<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;

class ProductEditName extends Component
{
    public $product;

    public $name;

    public function mount()
    {
        $this->name = $this->product->name;
    }

    public function render()
    {
        return view('livewire.product.dashboard.product-edit-name');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->product->name = $validatedData['name'];
        $this->product->save();
        $this->dispatch('productUpdateNameCompleted');
    }
}

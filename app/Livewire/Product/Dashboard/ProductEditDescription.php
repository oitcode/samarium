<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;

class ProductEditDescription extends Component
{
    public $product;

    public $description;

    public function mount()
    {
        $this->description = $this->product->description;
    }

    public function render()
    {
        return view('livewire.product.dashboard.product-edit-description');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'description' => 'required',
        ]);

        $this->product->description = $validatedData['description'];
        $this->product->save();
        $this->dispatch('productUpdateDescriptionCompleted');
    }
}

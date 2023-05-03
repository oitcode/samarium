<?php

namespace App\Http\Livewire\Product\Dashboard;

use Livewire\Component;

class ProductEditPrice extends Component
{
    public $product;

    public $price;

    public function mount()
    {
        $this->price = $this->product->selling_price;
    }

    public function render()
    {
        return view('livewire.product.dashboard.product-edit-price');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'price' => 'required|integer',
        ]);

        $this->product->selling_price = $validatedData['price'];
        $this->product->save();
        $this->emit('productUpdatePriceCompleted');
    }
}

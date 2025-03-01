<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;

class ProductEditImage extends Component
{
    use WithFileUploads;

    public $product;

    public $image;

    public function render(): View
    {
        return view('livewire.product.dashboard.product-edit-image');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'image' => 'required|image',
        ]);

        $imagePath = $this->image->store('products', 'public');
        $validatedData['image_path'] = $imagePath;

        $this->product->image_path = $validatedData['image_path'];
        $this->product->save();

        $this->dispatch('productUpdateImageCompleted');
    }
}

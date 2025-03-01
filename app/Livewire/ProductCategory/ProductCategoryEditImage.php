<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;

class ProductCategoryEditImage extends Component
{
    use WithFileUploads;

    public $productCategory;

    public $image;

    public function render(): View
    {
        return view('livewire.product-category.product-category-edit-image');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'image' => 'required|image',
        ]);

        $imagePath = $this->image->store('products', 'public');
        $validatedData['image_path'] = $imagePath;

        $this->productCategory->image_path = $validatedData['image_path'];
        $this->productCategory->save();

        $this->dispatch('productCategoryUpdateImageCompleted');
    }
}

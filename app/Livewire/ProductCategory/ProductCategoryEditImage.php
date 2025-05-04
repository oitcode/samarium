<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Services\ProductCategoryService;

class ProductCategoryEditImage extends Component
{
    use WithFileUploads;

    public $productCategory;

    public $image;

    public function render(): View
    {
        return view('livewire.product-category.product-category-edit-image');
    }

    public function update(ProductCategoryService $productCategoryService): void
    {
        $validatedData = $this->validate([
            'image' => 'required|image',
        ]);

        $productCategoryService->updateImage($this->productCategory->product_category_id, $validatedData['image']);
        $this->dispatch('productCategoryUpdateImageCompleted');
    }
}

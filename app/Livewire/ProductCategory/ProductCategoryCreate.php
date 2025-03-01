<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\ProductCategory;

class ProductCategoryCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $parent_product_category_id;

    public $productCategories;

    public function render(): View
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.product-category.product-category-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'parent_product_category_id' => 'nullable|integer',
        ]);


        if ($this->image !== null) {
            $imagePath = $this->image->store('productCategory', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        ProductCategory::create($validatedData);

        $this->resetInputFields();

        $this->dispatch('productCategoryCreateCompleted');
    }

    public function resetInputFields(): void
    {
        $this->name = '';
        $this->image = null;
    }
}

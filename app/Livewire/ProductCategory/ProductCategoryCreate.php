<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Services\ProductCategoryService;
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

    public function store(ProductCategoryService $productCategoryService): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'parent_product_category_id' => 'nullable|integer',
        ]);

        /* Create product category using the service */
        $productCategoryService->createProductCategory(
            $validatedData,
            $this->image,
        );

        $this->resetInputFields();

        $this->dispatch('productCategoryCreateCompleted');
    }

    public function resetInputFields(): void
    {
        $this->name = '';
        $this->image = null;
    }
}

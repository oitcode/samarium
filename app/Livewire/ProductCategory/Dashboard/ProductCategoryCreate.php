<?php

namespace App\Livewire\ProductCategory\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Services\ProductCategoryService;
use App\ProductCategory;

/**
 * ProductCategoryCreate Livewire Component
 *
 * This component handles the creation of product categories
 * from application dashboard.
 *
 */
class ProductCategoryCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $parent_product_category_id;

    public $productCategories;

    /**
     * Render the component's view.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.product-category.dashboard.product-category-create');
    }

    /**
     * Create a new product category.
     *
     * Validates the input data, creates the product category using the service,
     * resets the form fields, and dispatches a completion event.
     *
     * @param ProductCategoryService $productCategoryService
     * @return void
     */
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

    /**
     * Reset the input fields after form submission.
     *
     * Clears the name and image fields to prepare the form for a new entry.
     *
     * @return void
     */
    public function resetInputFields(): void
    {
        $this->name = '';
        $this->image = null;
    }
}

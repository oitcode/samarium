<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
use App\Services\ProductCategoryService;

/**
 * ProductCategoryEditName Livewire Component
 * 
 * This component handles the editing of a product category's name.
 * It provides form validation and updates the product
 * category name through the ProductCategoryService.
 *
 */
class ProductCategoryEditName extends Component
{
    /**
     * The product category model being edited.
     *
     * @var \App\Models\ProductCategory
     */
    public $productCategory;

    /**
     * The product category name being edited.
     *
     * @var string
     */
    public $name;

    /**
     * Initialize the component's state.
     * 
     * Sets the initial name value from the product category model.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->name = $this->productCategory->name;
    }

    /**
     * Render the component's view.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view('livewire.product-category.product-category-edit-name');
    }

    /**
     * Update the product category name.
     * 
     * Validates the input name, updates the category through the service,
     * and dispatches an event to notify other components of the update.
     *
     * @param \App\Services\ProductCategoryService $productCategoryService
     * @return void
     */
    public function update(ProductCategoryService $productCategoryService): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $productCategoryService->updateName($this->productCategory->product_category_id, $validatedData['name']);
        $this->dispatch('productCategoryUpdateNameCompleted');
    }
}

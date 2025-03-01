<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\ProductCategory;

class ProductEditCategory extends Component
{
    public $product;

    public $productCategories;

    public $product_category_id;

    public function render(): View
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.product.dashboard.product-edit-category');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'product_category_id' => 'required|integer',
        ]);

        $this->product->product_category_id = $validatedData['product_category_id'];
        $this->product->save();

        $this->dispatch('productUpdateCategoryCompleted');
    }
}

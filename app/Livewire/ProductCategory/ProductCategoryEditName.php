<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;

class ProductCategoryEditName extends Component
{
    public $productCategory;

    public $name;

    public function mount(): void
    {
        $this->name = $this->productCategory->name;
    }

    public function render(): View
    {
        return view('livewire.product-category.product-category-edit-name');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->productCategory->name = $validatedData['name'];
        $this->productCategory->save();
        $this->dispatch('productCategoryUpdateNameCompleted');
    }
}

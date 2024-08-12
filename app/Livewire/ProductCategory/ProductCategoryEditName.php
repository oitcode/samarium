<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;

class ProductCategoryEditName extends Component
{
    public $productCategory;

    public $name;

    public function mount()
    {
        $this->name = $this->productCategory->name;
    }

    public function render()
    {
        return view('livewire.product-category.product-category-edit-name');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->productCategory->name = $validatedData['name'];
        $this->productCategory->save();
        $this->dispatch('productCategoryUpdateNameCompleted');
    }
}

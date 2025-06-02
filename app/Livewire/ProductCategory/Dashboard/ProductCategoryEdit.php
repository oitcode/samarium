<?php

namespace App\Livewire\ProductCategory\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Product;
use App\ProductCategory;

class ProductCategoryEdit extends Component
{
    use WithFileUploads;

    public $productCategory;

    public $name;
    public $image;
    public $does_sell;

    public function mount(): void
    {
        $this->name = $this->productCategory->name;
        $this->does_sell = $this->productCategory->does_sell;
    }

    public function render(): View
    {
        return view('livewire.dashboard.product-category-edit');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'does_sell' => 'required',
        ]);

        if ($this->image !== null) {
            $image_path = $this->image->store('products', 'public');
            $validatedData['image_path'] = $image_path;
        }

        $this->productCategory->update($validatedData);

        // $this->resetInputFields();

        $this->dispatch('updateProductCategoryCompleted');
    }
}

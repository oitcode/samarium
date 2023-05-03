<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Product;
use App\ProductCategory;

class CafeMenuProductCategoryEdit extends Component
{
    use WithFileUploads;

    public $productCategory;

    public $name;
    public $image;

    public function render()
    {
        $this->name = $this->productCategory->name;

        return view('livewire.cafe-menu-product-category-edit');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($this->image !== null) {
            $image_path = $this->image->store('products', 'public');
            $validatedData['image_path'] = $image_path;
        }

        $this->productCategory->update($validatedData);

        // $this->resetInputFields();

        $this->emit('updateProductCategoryCompleted');
    }
}

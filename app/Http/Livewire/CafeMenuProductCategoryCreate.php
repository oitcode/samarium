<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;

use App\ProductCategory;

class CafeMenuProductCategoryCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $parent_product_category_id;

    public $productCategories;

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.cafe-menu-product-category-create');
    }

    public function store()
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

        session()->flash('success', 'Product Added');
        $this->resetInputFields();

        $this->emit('productCategoryCreateCompleted');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->image = null;
    }
}

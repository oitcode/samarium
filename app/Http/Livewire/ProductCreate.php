<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Product;
use App\ProductCategory;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $product_category_id;
    public $selling_price;

    public $productCategories;
    public $image;

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.product-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'product_category_id' => 'required',
            'selling_price' => 'required',
            'image' => 'image',
        ]);

        $imagePath = $this->image->store('products', 'public');
        $validatedData['image_path'] = $imagePath;

        Product::create($validatedData);

        $this->emit('clearModes');
    }
}

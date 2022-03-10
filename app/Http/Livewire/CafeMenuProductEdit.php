<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Product;
use App\ProductCategory;

class CafeMenuProductEdit extends Component
{
    use WithFileUploads;

    public $product;

    public $name;
    public $selling_price;
    public $description;
    public $product_category_id;
    public $stock_count = null;
    public $image;

    public $productCategories;

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        $this->name = $this->product->name;
        $this->selling_price = $this->product->selling_price;
        $this->description = $this->product->description;
        $this->product_category_id = $this->product->product_category_id;
        $this->product->stock_count = $this->product->stock_count;

        return view('livewire.cafe-menu-product-edit');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'product_category_id' => 'required|integer',
            'description' => 'required',
            'selling_price' => 'required|integer',
            'stock_count' => 'nullable|integer',
            'image' => 'nullable|image',
        ]);

        if ($this->image !== null) {
            $image_path = $this->image->store('products', 'public');
            $validatedData['image_path'] = $image_path;
        }

        $this->product->update($validatedData);

        session()->flash('success', 'Product Updated');
        // $this->resetInputFields();

        $this->emit('productUpdated');
    }
}

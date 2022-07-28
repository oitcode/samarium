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
    public $stock_applicable;
    public $stock_count;
    public $image;

    public $baseProducts;
    public $base_product_id;
    public $inventory_unit_consumption;

    public $productCategories;

    public function render()
    {
        $this->productCategories = ProductCategory::all();
        $this->baseProducts = Product::where('is_base_product', true)->get();

        $this->name = $this->product->name;
        $this->selling_price = $this->product->selling_price;
        $this->description = $this->product->description;
        $this->product_category_id = $this->product->product_category_id;
        $this->stock_applicable = $this->product->stock_applicable;
        $this->stock_count = $this->product->stock_count;
        $this->inventory_unit_consumption = $this->product->inventory_unit_consumption;

        if ($this->product->baseProduct) {
            $this->base_product_id = $this->product->baseProduct->base_product_id;
        }

        return view('livewire.cafe-menu-product-edit');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'product_category_id' => 'required|integer',
            'description' => 'required',
            'selling_price' => 'required|integer',
            'stock_applicable' => 'required',
            'stock_count' => 'nullable|integer',
            'image' => 'nullable|image',
            'base_product_id' => 'nullable|integer',
            'inventory_unit_consumption' => 'integer',
        ]);

        if ($this->image !== null) {
            $image_path = $this->image->store('products', 'public');
            $validatedData['image_path'] = $image_path;
        }

        $this->product->update($validatedData);

        if ($this->stock_count == '0') {
          // TOdo: Need to fix this!!!
        }

        session()->flash('success', 'Product Updated');

        $this->emit('productUpdated');
    }
}

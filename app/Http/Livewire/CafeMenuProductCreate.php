<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Product;
use App\ProductCategory;

class CafeMenuProductCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $selling_price;
    public $description;
    public $product_category_id;
    public $image;
    public $is_active;

    /* Stock/inentory related */
    public $stock_applicable;
    public $inventory_unit;
    public $stock_count = null;
    public $is_base_product;
    public $base_product_id;
    public $inventory_unit_consumption;

    public $baseProducts;

    public $productCategories;

    public function render()
    {
        $this->productCategories = ProductCategory::all();
        $this->baseProducts = Product::where('is_base_product', true)->get();

        return view('livewire.cafe-menu-product-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'product_category_id' => 'required|integer',
            'description' => 'required',
            'selling_price' => 'required|integer',
            'image' => 'nullable|image',
            'stock_applicable' => 'required',
            'is_base_product' => 'required',
            'base_product_id' => 'nullable|integer',
        ]);

        /* Stock/inventory related*/
        if ($validatedData['stock_applicable'] == 'yes') {
            $validatedData += $this->validate([
                'stock_count' => 'required|integer',
                'inventory_unit' => 'required',
            ]);
        }

        /* Make booleans in validatedData */
        if ($validatedData['is_base_product'] == 'yes') {
            $validatedData['is_base_product'] = true;
        } else {
            $validatedData['is_base_product'] = false;
        }

        if ($this->image !== null) {
            $imagePath = $this->image->store('products', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $product = Product::create($validatedData);

        if ($this->base_product_id != '---') {
            $product->base_product_id = $this->base_product_id;
            $product->inventory_unit_consumption = $this->inventory_unit_consumption;
            $product->save();
            $product = $product->fresh();
        }

        session()->flash('success', 'Product Added');
        $this->resetInputFields();

        $this->emit('productAdded');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->product_category_id = '';
        $this->description = '';
        $this->selling_price = '';
        $this->stock_count = '';
        $this->image = null;
    }
}

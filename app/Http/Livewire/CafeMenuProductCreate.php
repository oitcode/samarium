<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
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

    /* Stock/inventory related */
    public $stock_applicable = 'no';
    public $inventory_unit;
    public $opening_stock_count = null;
    public $stock_count = null;
    public $stock_notification_count;
    public $is_base_product = 'no';
    public $base_product_id;
    public $inventory_unit_consumption;

    public $baseProducts;

    public $productCategories;

    public $modes = [
        'stockApplicable' => false,
    ];

    public function render()
    {
        $this->productCategories = ProductCategory::all();
        $this->baseProducts = Product::where('is_base_product', true)->get();

        return view('livewire.cafe-menu-product-create');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
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
                'opening_stock_count' => 'required|integer',
                'stock_notification_count' => 'nullable|integer',
                'inventory_unit' => 'required',
            ]);

            $validatedData['stock_count'] = $validatedData['opening_stock_count'];
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

        DB::beginTransaction();

        try {
            $product = Product::create($validatedData);

            if (! is_null($this->base_product_id) && $this->base_product_id != '---') {
                dd($this->base_product_id);

                $product->base_product_id = $this->base_product_id;
                $product->inventory_unit_consumption = $this->inventory_unit_consumption;
                $product->save();
                $product = $product->fresh();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
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

    public function makeStockApplicable()
    {
        $this->stock_applicable = 'yes';

        $this->enterMode('stockApplicable');
    }
}

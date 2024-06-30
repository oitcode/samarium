<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

use App\Product;
use App\ProductCategory;
use App\ProductSpecification;

class ProductCreate extends Component
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
    public $product_type = 'normal';

    public $baseProducts;

    public $productCategories;

    /* This will hold all the product specifications. */
    public $productSpecifications = array();

    public $modes = [
        'stockApplicable' => false,
        'baseProduct' => false,
        'subProduct' => false,
    ];

    public function render()
    {
        $this->productCategories = ProductCategory::all();
        $this->baseProducts = Product::where('is_base_product', true)->get();

        return view('livewire.product-create');
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
            'product_type' => 'required',
        ]);

        /* Stock/inventory related*/
        if ($validatedData['stock_applicable'] == 'yes') {
            if ($this->product_type != 'sub') {
                $validatedData += $this->validate([
                    'opening_stock_count' => 'required|integer',
                    'stock_notification_count' => 'nullable|integer',
                    'inventory_unit' => 'required',
                ]);

                $validatedData['stock_count'] = $validatedData['opening_stock_count'];
            }

            /*
             * Todo
             *
             * Shouldnt this be better if user could
             * give this value from frontend?
             *
             */
            $validatedData['opening_stock_timestamp'] = Carbon::now()->toDateTimeString();
        }

        /* Make booleans in validatedData */
        if ($validatedData['is_base_product'] == 'yes') {
            $validatedData['is_base_product'] = true;
        } else {
            $validatedData['is_base_product'] = false;
        }

        if ($validatedData['product_type'] == 'base') {
            $validatedData['is_base_product'] = true;
        }

        if ($this->image !== null) {
            $imagePath = $this->image->store('products', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $validatedData['featured_product'] = 'no';

        DB::beginTransaction();

        try {
            $product = Product::create($validatedData);

            if (! is_null($this->base_product_id) && $this->base_product_id != '---') {
                $product->base_product_id = $this->base_product_id;
                $product->inventory_unit_consumption = $this->inventory_unit_consumption;
                $product->save();
                $product = $product->fresh();

                $product->inventory_unit = $product->baseProduct->inventory_unit;
                $product->save();
                $product = $product->fresh();
            }

            /* If there are any product specification, save them. */
            if (count($this->productSpecifications) > 0) {
                $ii = 0;
                foreach ($this->productSpecifications as $spec) {
                    if ($spec[0] == '' || $spec[1] =='') {
                    } else {
                        $productSpecification = new ProductSpecification;

                        $productSpecification->product_id = $product->product_id;

                        $productSpecification->position = $ii;
                        $productSpecification->spec_heading = $spec[0];
                        $productSpecification->spec_value = $spec[1];

                        $productSpecification->save();

                        $ii++;
                    }
                }
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

    public function makeStockNotApplicable()
    {
        $this->stock_applicable = 'no';

        $this->exitMode('stockApplicable');
    }

    public function updatedProductType()
    {
        if ($this->product_type == 'base') {
            $this->modes['baseProduct'] = true;
            $this->modes['subProduct'] = false;
        } else if ($this->product_type == 'sub') {
            $this->modes['subProduct'] = true;
            $this->modes['baseProduct'] = false;
        } else {
            $this->modes['baseProduct'] = false;
            $this->modes['subProduct'] = false;
        }
    }

    public function addSpecification()
    {
        $this->productSpecifications[] = ['', ''];
    }
}

<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\ModesTrait;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;

/**
 * Livewire component for creating new products in the dashboard.
 * 
 * This component handles the creation of products from dashboard. This
 * creates the product with minimum information required to create a
 * product. Those info are product name, product category, selling
 * price, description and product image (optional).
 *
 * Things like inventory management, base/sub product relationships, and
 * product specification can be added later in product display
 * component.
 *
 */
class ProductCreate extends Component
{
    use ModesTrait;
    use WithFileUploads;

    public $name;
    public $product_category_id;
    public $selling_price;
    public $description;
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

    /**
     * Render the product creation form view
     * 
     * Fetches all product categories and base products to populate dropdown menus
     * in the creation form.
     * 
     * @return View The rendered view for product creation
     */
    public function render(): View
    {
        $this->productCategories = ProductCategory::all();
        $this->baseProducts = Product::where('is_base_product', true)->get();

        return view('livewire.product.dashboard.product-create');
    }

    /**
     * Create a product in the database
     * 
     * Validates input data, handles image upload and creates the
     * product record.
     * 
     * @return void
     */
    public function store(ProductService $productService): void
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

        /* Stock/inventory related validation */
        if ($validatedData['stock_applicable'] == 'yes' && $this->product_type != 'sub') {
            $validatedData += $this->validate([
                'opening_stock_count' => 'required|integer',
                'stock_notification_count' => 'nullable|integer',
                'inventory_unit' => 'required',
            ]);
        }

        /* Add inventory unit consumption validation for sub-products */
        if (!empty($this->base_product_id) && $this->base_product_id != '---') {
            $validatedData['inventory_unit_consumption'] = $this->inventory_unit_consumption;
        }

        /* Create product using the service */
        $productService->createProduct(
            $validatedData,
            $this->image,
            $this->productSpecifications
        );

        $this->resetInputFields();
        $this->dispatch('productAdded');
    }

    /**
     * Reset all input fields to their default values
     * 
     * Clears all form fields after a product has been successfully created
     * or when the form needs to be reset.
     * 
     * @return void
     */
    public function resetInputFields(): void
    {
        $this->name = '';
        $this->product_category_id = '';
        $this->description = '';
        $this->selling_price = '';
        $this->stock_count = '';
        $this->image = null;
    }

    /**
     * Enable stock applicability for the product
     * 
     * Sets the stock_applicable flag to 'yes' and activates the
     * stockApplicable mode to show stock-related form fields.
     * 
     * @return void
     */
    public function makeStockApplicable(): void
    {
        $this->stock_applicable = 'yes';
        $this->enterMode('stockApplicable');
    }

    /**
     * Disable stock applicability for the product
     * 
     * Sets the stock_applicable flag to 'no' and deactivates the
     * stockApplicable mode to hide stock-related form fields.
     * 
     * @return void
     */
    public function makeStockNotApplicable(): void
    {
        $this->stock_applicable = 'no';
        $this->exitMode('stockApplicable');
    }

    /**
     * Handle changes to the product type
     * 
     * Updates component modes based on the selected product type (base,
     * sub, or normal) to show/hide relevant form sections.
     * 
     * @return void
     */
    public function updatedProductType(): void
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

    /**
     * Add a new empty product specification field to the form
     * 
     * Adds a new empty array with two elements to the productSpecifications array,
     * allowing users to add specification heading and value pairs.
     * 
     * @return void
     */
    public function addSpecification(): void
    {
        $this->productSpecifications[] = ['', ''];
    }
}

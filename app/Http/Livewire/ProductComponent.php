<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ProductCategory;
use App\Product;

class ProductComponent extends Component
{
    public $products = null;
    public $productCategories;

    public $updatingProduct;
    public $updatingProductCategory;

    public $displayingProduct;

    public $totalProducts;
    public $totalProductCategories;

    public $productSearch = [
        'name' => null,
    ];

    public $modes = [
        'showFullMenuList' => false,
        'updateProduct' => false,
        'displayProduct' => false,
        'updateProductCategory' => false,
        'createProduct' => false,
        'createProductCategory' => false,
        'list' => true,
        'createProductFromCsvMode' => false,
        'search' => false,
    ];

    protected $listeners = [
        'productAdded' => 'ackProductAdded',
        'productCategoryAdded' => 'ackProductCategoryAdded',
        'productCategoryDeleted' => 'ackProductCategoryDeleted',
        'exitUpdateProductMode',
        'updateProduct',
        'updateProductCategory',
        'exitCreateProductMode',
        'exitCreateProductCategoryMode',
        'exitUpdateProductCategoryMode',

        'displayProduct',
        'exitProductDisplayMode',
        'exitCreateProductFromCsvMode',
    ];

    public function mount()
    {
        $this->productCategories = ProductCategory::orderBy('name')->get();

        $this->totalProducts = Product::count();
        $this->totalProductCategories = ProductCategory::count();
    }

    public function render()
    {
        return view('livewire.product-component');
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

    public function search()
    {
        $this->products = new Product;

        if ($this->productSearch['name']) {
            $this->products = $this->products->where('name', 'like', '%'.$this->productSearch['name'].'%');
        } 

        $this->products = $this->products->get();
    }

    public function selectCategory($productCategoryId)
    {
        // $this->clearModes();

        $productCategory = ProductCategory::find($productCategoryId);

        $this->products = $productCategory->products;
    }

    public function showFullMenuList()
    {
        $this->enterMode('showFullMenuList');
    }

    public function ackProductCategoryAdded()
    {
        /* Todo: Can this line be removed? */
        $this->productCategories = ProductCategory::all();

        session()->flash('message', 'Product category added');

        $this->clearModes();
        $this->mount();
    }

    public function ackProductAdded()
    {
        session()->flash('message', 'Product added');

        $this->exitMode('createProduct');

        $this->mount();
    }

    public function updateProduct($productId)
    {
        $product = Product::findOrFail($productId);

        $this->updatingProduct = $product;
        $this->enterMode('updateProduct');
    }

    public function exitUpdateProductMode()
    {
        $this->updatingProduct = null;

        $this->exitMode('updateProduct');
    }

    public function updateProductCategory($productCategoryId)
    {
        $this->updatingProductCategory = ProductCategory::findOrFail($productCategoryId);

        $this->enterMode('updateProductCategory');
    }

    public function exitUpdateProductCategoryMode()
    {
        $this->updatingProductCategory = null;

        $this->exitMode('updateProductCategory');
    }

    public function exitCreateProductMode()
    {
        $this->exitMode('createProduct');
    }

    public function exitCreateProductCategoryMode()
    {
        $this->exitMode('createProductCategory');
    }

    public function displayProduct($productId)
    {
        $this->displayingProduct = Product::find($productId);

        $this->enterMode('displayProduct');
    }

    public function exitProductDisplayMode()
    {
        $this->exitMode('displayProduct');
        $this->enterMode('list');
    }

    public function exitCreateProductFromCsvMode()
    {
        $this->exitMode('createProductFromCsvMode');
    }

    public function ackProductCategoryDeleted()
    {
        $this->clearModes();
    }
}

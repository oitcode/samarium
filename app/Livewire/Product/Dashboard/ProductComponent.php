<?php

namespace App\Livewire\Product\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Product\ProductCategory;
use App\Models\Product\Product;

class ProductComponent extends Component
{
    use ModesTrait;
    
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

    public function mount(): void
    {
        $this->productCategories = ProductCategory::orderBy('name')->get();

        $this->totalProducts = Product::count();
        $this->totalProductCategories = ProductCategory::count();
    }

    public function render(): View
    {
        return view('livewire.product.dashboard.product-component');
    }

    public function search(): void
    {
        $this->products = new Product;

        if ($this->productSearch['name']) {
            $this->products = $this->products->where('name', 'like', '%'.$this->productSearch['name'].'%');
        } 

        $this->products = $this->products->get();
    }

    public function selectCategory($productCategoryId): void
    {
        // $this->clearModes();

        $productCategory = ProductCategory::find($productCategoryId);

        $this->products = $productCategory->products;
    }

    public function showFullMenuList(): void
    {
        $this->enterMode('showFullMenuList');
    }

    public function ackProductCategoryAdded(): void
    {
        /* Todo: Can this line be removed? */
        $this->productCategories = ProductCategory::all();

        session()->flash('message', 'Product category added');

        $this->clearModes();
        $this->mount();
    }

    public function ackProductAdded(): void
    {
        session()->flash('message', 'Product added');

        $this->exitMode('createProduct');

        $this->mount();
    }

    public function updateProduct($productId): void
    {
        $product = Product::findOrFail($productId);

        $this->updatingProduct = $product;
        $this->enterMode('updateProduct');
    }

    public function exitUpdateProductMode(): void
    {
        $this->updatingProduct = null;

        $this->exitMode('updateProduct');
    }

    public function updateProductCategory($productCategoryId): void
    {
        $this->updatingProductCategory = ProductCategory::findOrFail($productCategoryId);

        $this->enterMode('updateProductCategory');
    }

    public function exitUpdateProductCategoryMode(): void
    {
        $this->updatingProductCategory = null;

        $this->exitMode('updateProductCategory');
    }

    public function exitCreateProductMode(): void
    {
        $this->exitMode('createProduct');
    }

    public function exitCreateProductCategoryMode(): void
    {
        $this->exitMode('createProductCategory');
    }

    public function displayProduct($productId): void
    {
        $this->displayingProduct = Product::find($productId);

        $this->enterMode('displayProduct');
    }

    public function exitProductDisplayMode(): void
    {
        $this->displayingProduct = null;
        $this->exitMode('displayProduct');
        $this->enterMode('list');
    }

    public function exitCreateProductFromCsvMode(): void
    {
        $this->exitMode('createProductFromCsvMode');
    }

    public function ackProductCategoryDeleted(): void
    {
        $this->clearModes();
    }
}

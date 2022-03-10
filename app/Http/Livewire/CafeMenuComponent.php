<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ProductCategory;
use App\Product;

class CafeMenuComponent extends Component
{
    public $products = null;
    public $productCategories;

    public $updatingProduct;

    public $productSearch = [
        'name' => null,
    ];

    public $modes = [
        'showFullMenuList' => true,
        'updateProduct' => false,
    ];

    protected $listeners = [
        'productAdded' => 'ackProductAdded',
        'productCategoryAdded' => 'ackProductCategoryAdded',
        'exitUpdateProductMode',
    ];

    public function mount()
    {
        $this->productCategories = ProductCategory::all();
        // $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.cafe-menu-component');
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
        $this->clearModes();

        $productCategory = ProductCategory::find($productCategoryId);

        $this->products = $productCategory->products;
    }

    public function showFullMenuList()
    {
        $this->enterMode('showFullMenuList');
    }

    public function ackProductCategoryAdded()
    {
        //
    }

    public function ackProductAdded()
    {
        $this->render();
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
}

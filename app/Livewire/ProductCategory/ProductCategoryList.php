<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;

use App\ProductCategory;

class ProductCategoryList extends Component
{
    public $productCategories;
    public $products = null;
    public $selectedProductCategory;

    public $search_product_category;

    public $modes = [
        'productCategoryProductList' => false,
    ];

    public function mount()
    {
        $this->productCategories = ProductCategory::orderBy('name', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.product-category.product-category-list');
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

    public function selectCategory($productCategoryId)
    {
        $this->selectedProductCategory = ProductCategory::find($productCategoryId);
        $this->enterMode('productCategoryProductList');
    }

    public function searchProductCategory()
    {
        $validatedData = $this->validate([
            'search_product_category' => 'required',
        ]);

        $productCategories = ProductCategory::where('name', 'like', '%'.$validatedData['search_product_category'].'%')->get();

        $this->productCategories = $productCategories;
    }
}

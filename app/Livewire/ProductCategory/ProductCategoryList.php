<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Livewire\WithPagination;
use App\ProductCategory;

class ProductCategoryList extends Component
{
    use WithPagination;

    // public $productCategories;
    public $products = null;
    public $selectedProductCategory;
    public $totalProductCategoryCount;

    public $search_product_category;

    public $modes = [
        'productCategoryProductList' => false,
    ];

    public function mount()
    {
    }

    public function render()
    {
        $this->totalProductCategoryCount = ProductCategory::count();
        $productCategories = ProductCategory::orderBy('name', 'ASC')->paginate(5);

        return view('livewire.product-category.product-category-list')
            ->with('productCategories', $productCategories);
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

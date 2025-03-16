<?php

namespace App\Livewire\Product\Website;

use Livewire\Component;
use App\ProductCategory;
use App\Product;
use App\ProductSpecification;

class ProductFilter extends Component
{
    public $productCategories;
    public $cityProductSpecifications;
    public $buyTypeProductSpecifications;

    public function render()
    {
        $this->prepareFilters();

        return view('livewire.product.website.product-filter');
    }

    public function prepareFilters()
    {
        $this->productCategories = ProductCategory::all();

        $this->cityProductSpecifications = ProductSpecification::where('spec_heading', 'City')->get();
        $this->cityProductSpecifications = $this->cityProductSpecifications->unique('spec_value');

        $this->buyTypeProductSpecifications = ProductSpecification::where('spec_heading', 'buy type')->get();
        $this->buyTypeProductSpecifications = $this->buyTypeProductSpecifications->unique('spec_value');
    }

    public function prepareCitiesFilter()
    {
        $cityProductSpecifications = ProductSpecification::where('spec_heading', 'city')->get();
    }
}

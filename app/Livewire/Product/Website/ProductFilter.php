<?php

namespace App\Livewire\Product\Website;

use Livewire\Component;
use App\Models\Product\ProductCategory;
use App\Models\Product\Product;
use App\Models\Product\ProductSpecification;

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
        $this->productCategories = ProductCategory::where('does_sell', 'yes')->get();

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

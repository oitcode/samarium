<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;

use App\Company;
use App\ProductCategory;
use App\Product;

class HomeComponent extends Component
{
    public $modes = [
        'searchResult' => false,
    ];

    protected $listeners = [
    ];

    public $company;

    public $productCategories;
    public $products;

    public $search_name;

    public function render()
    {
        $this->company = Company::first();

        $this->productCategories = ProductCategory::where('does_sell', 'yes')->where('parent_product_category_id', null)->get();

        return view('livewire.ecomm-website.home-component');
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
        $validatedData = $this->validate([
            'search_name' => 'required',
        ]);

        $this->products = Product::where('name', 'like', '%'.$validatedData['search_name'].'%')->get();

        $this->enterMode('searchResult');
    }
}

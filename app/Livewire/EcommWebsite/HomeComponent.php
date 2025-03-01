<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Company;
use App\ProductCategory;
use App\Product;

class HomeComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'searchResult' => false,
    ];

    protected $listeners = [
    ];

    public $company;

    public $productCategories;
    public $products;

    public $search_name;

    public function render(): View
    {
        $this->company = Company::first();

        $this->productCategories = ProductCategory::where('does_sell', 'yes')->where('parent_product_category_id', null)->get();

        return view('livewire.ecomm-website.home-component');
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'search_name' => 'required',
        ]);

        $this->products = Product::where('name', 'like', '%'.$validatedData['search_name'].'%')->get();

        $this->enterMode('searchResult');
    }
}

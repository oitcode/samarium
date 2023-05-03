<?php

namespace App\Http\Livewire\EcommWebsite;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\ProductCategory;

class TopMenu extends Component
{
    use ModesTrait;

    public $productCategories;

    public $modes = [
        'showAllCategoriesMode' => false,
        'showMobileMenuMode' => false,
    ];

    public function mount()
    {
        $this->productCategories = ProductCategory::limit(5)->get();
    }

    public function render()
    {
        if ($this->modes['showMobileMenuMode']) {
            $this->productCategories = ProductCategory::all();
        }

        return view('livewire.ecomm-website.top-menu');
    }

    public function showAllCategories()
    {
        $this->productCategories = ProductCategory::orderBy('name')->get();

        $this->enterMode('showAllCategoriesMode');
    }

    public function closeFullMenu()
    {
        $this->productCategories = ProductCategory::limit(5)->get();
        $this-> exitMode('showAllCategoriesMode');
    }


}

<?php

namespace App\Livewire\EcommWebsite;

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
        $this->productCategories = ProductCategory::where('does_sell', 'yes')->limit(5)->get();
    }

    public function render()
    {
        if ($this->modes['showMobileMenuMode']) {
            $this->productCategories = ProductCategory::where('does_sell', 'yes')->get();
        }

        return view('livewire.ecomm-website.top-menu');
    }

    public function showAllCategories()
    {
        $this->productCategories = ProductCategory::where('does_sell', 'yes')->orderBy('name')->get();

        $this->enterMode('showAllCategoriesMode');
    }

    public function closeFullMenu()
    {
        $this->productCategories = ProductCategory::where('does_sell', 'yes')->limit(5)->get();
        $this-> exitMode('showAllCategoriesMode');
    }
}

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
    ];

    public function mount()
    {
        $this->productCategories = ProductCategory::limit(5)->get();
    }

    public function render()
    {
        return view('livewire.ecomm-website.top-menu');
    }

    public function showAllCategories()
    {
        $this->productCategories = ProductCategory::all();

        $this->enterMode('showAllCategoriesMode');
    }
}

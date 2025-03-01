<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\View\View;
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

    public function mount(): void
    {
        $this->productCategories = ProductCategory::where('does_sell', 'yes')->limit(5)->get();
    }

    public function render(): View
    {
        if ($this->modes['showMobileMenuMode']) {
            $this->productCategories = ProductCategory::where('does_sell', 'yes')->get();
        }

        return view('livewire.ecomm-website.top-menu');
    }

    public function showAllCategories(): void
    {
        $this->productCategories = ProductCategory::where('does_sell', 'yes')->orderBy('name')->get();

        $this->enterMode('showAllCategoriesMode');
    }

    public function closeFullMenu(): void
    {
        $this->productCategories = ProductCategory::where('does_sell', 'yes')->limit(5)->get();
        $this-> exitMode('showAllCategoriesMode');
    }
}

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
    ];

    public function render()
    {
        $this->productCategories = ProductCategory::limit(5)->get();

        return view('livewire.ecomm-website.top-menu');
    }
}

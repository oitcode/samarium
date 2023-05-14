<?php

namespace App\Http\Livewire\EcommWebsite;

use Livewire\Component;

use App\Traits\ModesTrait;

class ProductCategoryProductListL1 extends Component
{
    use ModesTrait;

    public $productCategory;

    public $modes = [
        'openUpMode' => false,
    ];

    public function render()
    {
        return view('livewire.ecomm-website.product-category-product-list-l1');
    }
}

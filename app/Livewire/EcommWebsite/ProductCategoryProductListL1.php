<?php

namespace App\Livewire\EcommWebsite;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;

class ProductCategoryProductListL1 extends Component
{
    use ModesTrait;

    public $productCategory;

    public $modes = [
        'openUpMode' => false,
    ];

    public function render(): void
    {
        return view('livewire.ecomm-website.product-category-product-list-l1');
    }
}

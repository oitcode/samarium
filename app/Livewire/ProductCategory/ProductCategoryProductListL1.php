<?php

namespace App\Livewire\ProductCategory;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;

class ProductCategoryProductListL1 extends Component
{
    use ModesTrait;

    public $modes = [
        'openUpMode' => false,
    ];

    public function render(): View
    {
        return view('livewire.product-category.product-category-product-list-l1');
    }
}

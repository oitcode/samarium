<?php

namespace App\Http\Livewire\CafeMenu;

use Livewire\Component;

use App\Traits\ModesTrait;

class ProductCategoryProductListL1 extends Component
{
    use ModesTrait;

    public $modes = [
        'openUpMode' => false,
    ];

    public function render()
    {
        return view('livewire.cafe-menu.product-category-product-list-l1');
    }
}

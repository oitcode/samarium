<?php

namespace App\Http\Livewire\CafeMenu;

use Livewire\Component;

use App\Traits\ModesTrait;

class ProductCategoryDisplay extends Component
{
    use ModesTrait;

    public $productCategory;

    public $modes = [
    ];

    public function render()
    {
        return view('livewire.cafe-menu.product-category-display');
    }
}

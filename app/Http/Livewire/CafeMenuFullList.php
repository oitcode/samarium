<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ProductCategory;

class CafeMenuFullList extends Component
{
    public $productCategories;

    protected $listeners = [
        'productAdded' => 'ackProductAdded',
    ];

    public function render()
    {
        $this->productCategories = ProductCategory::all();

        return view('livewire.cafe-menu-full-list');
    }

    public function ackProductAdded()
    {
        $this->render();
    }
}

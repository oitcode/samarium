<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\ProductCategory;

class ProductCategoryCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.product-category-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        ProductCategory::create($validatedData);

        $this->emit('clearModes');
    }
}

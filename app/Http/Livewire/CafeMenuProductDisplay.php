<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Traits\ModesTrait;

class CafeMenuProductDisplay extends Component
{
    use ModesTrait;

    public $product;

    public $modes = [
        'updateProductNameMode' => false,
    ];

    protected $listeners = [
        'productUpdateNameCancelled',
        'productUpdateNameCompleted',
    ];

    public function render()
    {
        return view('livewire.cafe-menu-product-display');
    }

    public function productUpdateNameCancelled()
    {
        $this->exitMode('updateProductNameMode');
    }

    public function productUpdateNameCompleted()
    {
        session()->flash('message', 'Product updated');
        $this->exitMode('updateProductNameMode');
    }
}

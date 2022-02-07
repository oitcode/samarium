<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SaleDetail extends Component
{
    public $sale;

    public function render()
    {
        return view('livewire.sale-detail');
    }
}

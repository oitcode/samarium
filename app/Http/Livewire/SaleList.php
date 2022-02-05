<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Sale;

class SaleList extends Component
{
    public $sales;

    public function render()
    {
        $this->sales = Sale::all();

        return view('livewire.sale-list');
    }
}

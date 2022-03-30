<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SeatTableWorkDisplayCustomer extends Component
{
    public $seatTable;
    public $customer = null;

    public function render()
    {
        return view('livewire.seat-table-work-display-customer');
    }
}

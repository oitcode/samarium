<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SeatTable;

class SeatTableList extends Component
{
    public $seatTables;

    public function render()
    {
        $this->seatTables = SeatTable::all();

        return view('livewire.seat-table-list');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SeatTable;

class SeatTableList extends Component
{
    public $seatTables;

    protected $listeners = [
        'seatTableDeleted' => 'render',
    ];

    public function render()
    {
        $this->seatTables = SeatTable::all();

        return view('livewire.seat-table-list');
    }
}

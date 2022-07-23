<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SeatTableListDisplay extends Component
{
    public $seatTable;

    public function render()
    {
        return view('livewire.seat-table-list-display');
    }

    public function displayWorkingSeatTable($seatTableId)
    {
        $this->emit('displayWorkingSeatTable', $seatTableId);
    }
}

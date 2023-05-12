<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SeatTable;

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

    public function displaySeatTableXypher($seatTableId)
    {
        $this->emit('displaySeatTableXypher', $seatTableId);
    }

    public function deleteSeatTable(SeatTable $seatTable)
    {
        $seatTable->delete();

        $this->emit('seatTableDeleted');
    }
}

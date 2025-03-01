<?php

namespace App\Livewire\CafeSale;

use Livewire\Component;
use Illuminate\View\View;
use App\SeatTable;

class SeatTableListDisplay extends Component
{
    public $seatTable;

    public function render(): View
    {
        return view('livewire.cafe-sale.seat-table-list-display');
    }

    public function displayWorkingSeatTable($seatTableId): void
    {
        $this->dispatch('displayWorkingSeatTable', $seatTableId);
    }

    public function displaySeatTableXypher($seatTableId): void
    {
        $this->dispatch('displaySeatTableXypher', $seatTableId);
    }

    public function deleteSeatTable(SeatTable $seatTable): void
    {
        $seatTable->delete();

        $this->dispatch('seatTableDeleted');
    }
}

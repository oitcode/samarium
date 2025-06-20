<?php

namespace App\Livewire\CafeSale\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\SeatTable\SeatTable;

class SeatTableListDisplay extends Component
{
    public SeatTable $seatTable;

    public function render(): View
    {
        return view('livewire.cafe-sale.dashboard.seat-table-list-display');
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

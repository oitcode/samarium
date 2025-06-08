<?php

namespace App\Livewire\CafeSale\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use App\Models\SeatTable\SeatTable;

class SeatTableList extends Component
{
    public Collection $seatTables;

    protected $listeners = [
        'seatTableDeleted' => 'render',
    ];

    public function render(): View
    {
        $this->seatTables = SeatTable::all();

        return view('livewire.cafe-sale.dashboard.seat-table-list');
    }
}

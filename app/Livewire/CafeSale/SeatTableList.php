<?php

namespace App\Livewire\CafeSale;

use Livewire\Component;
use Illuminate\View\View;
use App\SeatTable;

class SeatTableList extends Component
{
    public $seatTables;

    protected $listeners = [
        'seatTableDeleted' => 'render',
    ];

    public function render(): View
    {
        $this->seatTables = SeatTable::all();

        return view('livewire.cafe-sale.seat-table-list');
    }
}

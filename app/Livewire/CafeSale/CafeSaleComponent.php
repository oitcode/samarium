<?php

namespace App\Livewire\CafeSale;

use Livewire\Component;

use App\Traits\ModesTrait;

use App\SeatTable;

class CafeSaleComponent extends Component
{
    use ModesTrait;

    public $workingSeatTable = null;
    public $displayingSeatTable = null;

    public $modes = [
        'workingTableDisplay' => false,

        'createSeatTableMode' => false,

        'seatTableDisplayXypher' => false,

        'editSettingsMode' => false,
    ];

    protected $listeners = [
        'displayWorkingSeatTable',
        'seatTableCreateCompleted',
        'seatTableCreateCancelled',
        'displaySeatTableXypher',
    ];

    public function render()
    {
        return view('livewire.cafe-sale.cafe-sale-component');
    }

    public function displayWorkingSeatTable($seat_table_id)
    {
        $seatTable = SeatTable::findOrFail($seat_table_id);

        $this->workingSeatTable = $seatTable;
        $this->enterMode('workingTableDisplay');
    }

    public function seatTableCreateCompleted()
    {
        $this->exitMode('createSeatTableMode');
    }

    public function seatTableCreateCancelled()
    {
        $this->exitMode('createSeatTableMode');
    }

    public function  displaySeatTableXypher($seat_table_id)
    {
        $seatTable = SeatTable::findOrFail($seat_table_id);

        $this->displayingSeatTable = $seatTable;
        $this->enterMode('seatTableDisplayXypher');
    }
}

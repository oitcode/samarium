<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SeatTable;

class CafeSaleComponent extends Component
{
    public $workingSeatTable = null;

    public $modes = [
        'workingTableDisplay' => false,
    ];

    protected $listeners = [
        'displayWorkingSeatTable',
    ];

    public function render()
    {
        return view('livewire.cafe-sale-component');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function displayWorkingSeatTable($seat_table_id)
    {
        $seatTable = SeatTable::findOrFail($seat_table_id);

        $this->workingSeatTable = $seatTable;
        $this->enterMode('workingTableDisplay');
    }
}

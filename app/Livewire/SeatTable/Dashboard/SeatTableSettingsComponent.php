<?php

namespace App\Livewire\SeatTable\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class SeatTableSettingsComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'createSeatTableMode' => false,
        'displaySeatTableMode' => false,
    ];

    protected $listeners = [
        'createSeatTableCancelled',
        'seatTableCreateCancelled' => 'createSeatTableCancelled',

        'createSeatTableCompleted',
        'seatTableCreateCompleted' => 'createSeatTableCompleted',
    ];

    public function render()
    {
        return view('livewire.seat-table.dashboard.seat-table-settings-component');
    }

    public function createSeatTableCancelled()
    {
        $this->exitMode('createSeatTableMode');
    }

    public function createSeatTableCompleted()
    {
        $this->exitMode('createSeatTableMode');
    }
}

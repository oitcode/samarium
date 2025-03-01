<?php

namespace App\Livewire\SeatTable\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        return view('livewire.seat-table.dashboard.seat-table-settings-component');
    }

    public function createSeatTableCancelled(): void
    {
        $this->exitMode('createSeatTableMode');
    }

    public function createSeatTableCompleted(): void
    {
        $this->exitMode('createSeatTableMode');
    }
}

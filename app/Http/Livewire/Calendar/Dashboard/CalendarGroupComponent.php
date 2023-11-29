<?php

namespace App\Http\Livewire\Calendar\Dashboard;

use Livewire\Component;

use App\Traits\ModesTrait;

class CalendarGroupComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'createCalendarGroupMode' => false,
        'listCalendarGroupMode' => false,
    ];

    protected $listeners = [
        'calendarGroupCreateCancelled',
        'calendarGroupCreateCompleted',
    ];

    public function render()
    {
        return view('livewire.calendar.dashboard.calendar-group-component');
    }

    public function calendarGroupCreateCompleted()
    {
        session()->flash('message', 'Calendar group created.');
        $this->exitMode('createCalendarGroupMode');
    }

    public function calendarGroupCreateCancelled()
    {
        $this->exitMode('createCalendarGroupMode');
    }
}

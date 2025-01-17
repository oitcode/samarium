<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use App\CalendarGroup;

use App\Traits\ModesTrait;

class CalendarGroupComponent extends Component
{
    use ModesTrait;

    public $displayingCalendarGroup;

    public $modes = [
        'createCalendarGroupMode' => false,
        'listCalendarGroupMode' => false,
        'displayCalendarGroupMode' => false,
    ];

    protected $listeners = [
        'calendarGroupCreateCancelled',
        'calendarGroupCreateCompleted',
        'displayCalendarGroup',
        'calendarGroupDisplayCancelled',
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

    public function displayCalendarGroup(CalendarGroup $calendarGroup)
    {
        $this->displayingCalendarGroup = $calendarGroup;
        $this->enterMode('displayCalendarGroupMode');
    }

    public function calendarGroupDisplayCancelled()
    {
        $this->displayingCalendarGroup = null;
        $this->exitMode('displayCalendarGroupMode');
    }
}

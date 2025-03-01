<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        return view('livewire.calendar.dashboard.calendar-group-component');
    }

    public function calendarGroupCreateCompleted(): void
    {
        session()->flash('message', 'Calendar group created.');
        $this->exitMode('createCalendarGroupMode');
    }

    public function calendarGroupCreateCancelled(): void
    {
        $this->exitMode('createCalendarGroupMode');
    }

    public function displayCalendarGroup(CalendarGroup $calendarGroup): void
    {
        $this->displayingCalendarGroup = $calendarGroup;
        $this->enterMode('displayCalendarGroupMode');
    }

    public function calendarGroupDisplayCancelled(): void
    {
        $this->displayingCalendarGroup = null;
        $this->exitMode('displayCalendarGroupMode');
    }
}

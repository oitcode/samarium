<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;

class CalendarGroupDisplay extends Component
{
    public $calendarGroup;

    public function render()
    {
        return view('livewire.calendar.dashboard.calendar-group-display');
    }
}

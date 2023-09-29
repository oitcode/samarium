<?php

namespace App\Http\Livewire\School;

use Livewire\Component;

class CalendarEventDisplay extends Component
{
    public $calendarEvent;

    public function render()
    {
        return view('livewire.school.calendar-event-display');
    }
}

<?php

namespace App\Livewire\Calendar\Website;

use Livewire\Component;

use App\SchoolCalendarEvent;

class UpcomingEventsList extends Component
{
    public $calendarEvents;

    public function render()
    {
        $this->calendarEvents = SchoolCalendarEvent::whereDate('start_date', '>=', \Carbon\Carbon::today())->orderBy('start_date', 'asc')->get();

        return view('livewire.calendar.website.upcoming-events-list');
    }
}

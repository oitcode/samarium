<?php

namespace App\Http\Livewire\Calendar\Dashboard;

use Livewire\Component;

use App\CalendarGroup;

class CalendarGroupList extends Component
{
    public $calendarGroups;

    public function render()
    {
        $this->calendarGroups = CalendarGroup::all();

        return view('livewire.calendar.dashboard.calendar-group-list');
    }
}

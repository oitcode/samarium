<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\CalendarGroup;

class CalendarGroupList extends Component
{
    use WithPagination;

    // public $calendarGroups;

    public function render()
    {
        $calendarGroups = CalendarGroup::orderBy('calendar_group_id', 'DESC')->paginate(5);

        return view('livewire.calendar.dashboard.calendar-group-list')
            ->with('calendarGroups', $calendarGroups);
    }
}

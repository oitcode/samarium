<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\CalendarGroup;

class CalendarGroupList extends Component
{
    use WithPagination;

    // public $calendarGroups;
    public $totalCalendarGroupCount;

    public function render(): View
    {
        $calendarGroups = CalendarGroup::orderBy('calendar_group_id', 'DESC')->paginate(5);
        $this->totalCalendarGroupCount = CalendarGroup::count();

        return view('livewire.calendar.dashboard.calendar-group-list')
            ->with('calendarGroups', $calendarGroups);
    }
}

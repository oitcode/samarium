<?php

namespace App\Http\Livewire\Calendar\Website;

use Livewire\Component;
use Carbon\Carbon;

use App\SchoolCalendarEvent;
use App\CalendarGroup;

class TodayDisplay extends Component
{
    public $today;

    public $selectedCalendarGroup;

    public $calendarGroups;

    public function mount()
    {
        $this->calendarGroups = CalendarGroup::all();

        // $this->selectedCalendarGroup = CalendarGroup::first();
    }

    public function render()
    {
        $this->populateToday();

        return view('livewire.calendar.website.today-display');
    }

    public function populateToday()
    {
        $day = Carbon::today();

        $this->today = array();

        $this->today['day'] = $day->copy();
        $this->today['is_holiday'] = $this->checkIfDayIsHoliday($day->copy());
        $this->today['events'] = $this->getEventsForTheDay($day->copy());

        $this->today['is_holiday'] = 'no';
        foreach ($this->today['events'] as $event) {
            if ($event->is_holiday == 'yes') {
                $this->today['is_holiday'] = 'yes';
                break;
            }
        }
    }

    public function checkIfDayIsHoliday($day)
    {
        $events = SchoolCalendarEvent::whereDate('start_date' , '<=', $day->toDateString())
            ->whereDate('end_date', '>=', $day->toDateString())
            ->where('is_holiday', 'yes')
            ->get();

        $calendarGroupEvent = collect([]);

        foreach ($events as $event) {
            if ($event->calendarGroups && count($event->calendarGroups) > 0) {
                foreach ($event->calendarGroups as $calendarGroup) {
                    if ($calendarGroup->calendar_group_id == $this->selectedCalendarGroup->calendar_group_id) {
                        $calendarGroupEvent->push($event);
                    }
                }
            } else {
                $calendarGroupEvent->push($event);
            }
        }

        if (count($calendarGroupEvent)) {
            return true;
        } else {
            return false;
        }
    }

    public function getEventsForTheDay($day)
    {
        $events = SchoolCalendarEvent::whereDate('start_date' , '<=', $day->toDateString())
            ->whereDate('end_date', '>=', $day->toDateString())
            ->get();

        $calendarGroupEvent = collect([]);

        foreach ($events as $event) {
            if ($event->calendarGroups && count($event->calendarGroups) > 0) {
                foreach ($event->calendarGroups as $calendarGroup) {
                    if ($calendarGroup->calendar_group_id == $this->selectedCalendarGroup->calendar_group_id) {
                        $calendarGroupEvent->push($event);
                    }
                }
            } else {
                $calendarGroupEvent->push($event);
            }
        }

        return $calendarGroupEvent;
    }
}

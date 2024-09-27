<?php

namespace App\Livewire\Calendar\Website;

use Livewire\Component;

use App\SchoolCalendarEvent;
use App\CalendarGroup;

class UpcomingEventsList extends Component
{
    public $calendarEvents;

    public $monthBook = array();

    public $displayMonthName;
    public $startDay;
    public $endDay;

    public $today;

    public $displayingCalendarEvent;
    public $calendarGroups;
    public $selectedCalendarGroup = null;

    public function mount()
    {
        $this->calendarGroups = CalendarGroup::all();
        $this->selectedCalendarGroup = CalendarGroup::first();

        $this->populateMonthBook();

        if (count($this->calendarGroups) > 0) {
            $this->calendarEvents = SchoolCalendarEvent::whereHas('calendarGroups', function ($query) { $query->where('name', $this->selectedCalendarGroup->name);})
                ->whereDate('start_date', '>=', \Carbon\Carbon::today())
                ->orderBy('start_date', 'asc')
                ->get();
        } else {
            $this->calendarEvents = SchoolCalendarEvent::whereDate('start_date', '>=', \Carbon\Carbon::today())
                ->orderBy('start_date', 'asc')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.calendar.website.upcoming-events-list');
    }

    public function selectCalendarGroup(CalendarGroup $calendarGroup)
    {
        $this->selectedCalendarGroup = $calendarGroup;

        $this->populateMonthBook();

        $this->calendarEvents = SchoolCalendarEvent::whereHas('calendarGroups', function ($query) { $query->where('name', $this->selectedCalendarGroup->name);})
            ->whereDate('start_date', '>=', \Carbon\Carbon::today())
            ->orderBy('start_date', 'asc')
            ->get();
    }

    public function populateMonthBook()
    {
        // $monthStartDate = $this->monthInfo2081[$this->displayMonthName][0];
        // $monthEndDate = $this->monthInfo2081[$this->displayMonthName][1];

        $monthStartDay = \Carbon\Carbon::today();
        $monthEndDay = $monthStartDay->copy()->addDays(30);

        $this->monthBook = array();

        $day = $monthStartDay->copy();

        for ($i = 0; ; $i++) {
            $this->monthBook[] = [
                'day' => $day->copy(),
                'is_holiday' => $this->checkIfDayIsHoliday($day->copy()),
                'events' => $this->getEventsForTheDay($day->copy()),
            ];

            $day = $day->addDay();

            if ($day > $monthEndDay) {
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
                // $calendarGroupEvent->push($event);
            }
        }

        return $calendarGroupEvent;
    }
}

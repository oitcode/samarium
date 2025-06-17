<?php

namespace App\Livewire\Calendar\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Calendar\SchoolCalendarEvent;
use App\Models\Calendar\CalendarGroup;

class UpcomingEventsList extends Component
{
    public $calendarEvents;

    public $monthBook = array();
    public $hasEvents;

    public $displayMonthName;
    public $startDay;
    public $endDay;

    public $today;

    public $displayingCalendarEvent;
    public $calendarGroups;
    public $selectedCalendarGroup = null;

    public function mount(): void
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

    public function render(): View
    {
        return view('livewire.calendar.website.upcoming-events-list');
    }

    public function selectCalendarGroup(CalendarGroup $calendarGroup): void
    {
        $this->selectedCalendarGroup = $calendarGroup;

        $this->populateMonthBook();

        $this->calendarEvents = SchoolCalendarEvent::whereHas('calendarGroups', function ($query) { $query->where('name', $this->selectedCalendarGroup->name);})
            ->whereDate('start_date', '>=', \Carbon\Carbon::today())
            ->orderBy('start_date', 'asc')
            ->get();
    }

    public function populateMonthBook(): void
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

        $this->hasEvents = $this->checkIfAnyEvents();
    }

    public function checkIfDayIsHoliday($day): bool
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

    public function getEventsForTheDay($day) // Todo: Type hint return type
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

    public function checkIfAnyEvents(): bool
    {
        foreach ($this->monthBook as $day) {
            if ($day['events']) {
                return true;
            }
        }

        return false;
    }
}

<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Carbon\Carbon;

use App\SchoolCalendarEvent;

class CalendarGlanceComponent extends Component
{
    public $calendarDate;

    public $calendarEvents;
    public $today;

    public function mount()
    {
        $this->calendarDate = date('Y-m-d');
    }

    public function render()
    {
        $this->populateCalendarDateBook();

        return view('livewire.calendar.dashboard.calendar-glance-component');
    }

    public function setPreviousDay()
    {
        $this->calendarDate = Carbon::create($this->calendarDate)->subDay()->toDateString();
        $this->dispatch('changeDate', $this->calendarDate);
    }

    public function setNextDay()
    {
        $this->calendarDate = Carbon::create($this->calendarDate)->addDay()->toDateString();
        $this->dispatch('changeDate', $this->calendarDate);
    }

    public function setCalendarDate()
    {
        $validatedData = $this->validate([
            'calendarDate' => 'required|date',
        ]);

        $this->calendarDate = $validatedData['calendarDate'];
        $this->dispatch('changeDate', $this->calendarDate);
    }

    public function populateCalendarDateBook()
    {
        $day = Carbon::parse($this->calendarDate);

        $this->today = array();

        $this->today['day'] = $day->copy();
        $this->today['is_holiday'] = $this->checkIfDayIsHoliday($day->copy());
        $this->today['events'] = $this->getEventsForTheDay($day->copy());

        /*
        $this->today['is_holiday'] = 'no';
        foreach ($this->today['events'] as $event) {
            if ($event->is_holiday == 'yes') {
                $this->today['is_holiday'] = 'yes';
                break;
            }
        }
        */
    }

    public function checkIfDayIsHoliday($day)
    {
        $events = SchoolCalendarEvent::whereDate('start_date' , '<=', $day->toDateString())
            ->whereDate('end_date', '>=', $day->toDateString())
            ->where('is_holiday', 'yes')
            ->get();

        if (count($events) > 0) {
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

        return $events;
    }
}

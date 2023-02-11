<?php

namespace App\Http\Livewire\School\Cms;

use Livewire\Component;
use Carbon\Carbon;

use App\Traits\ModesTrait;

use App\SchoolCalendarEvent;


class CalendarComponent extends Component
{
    use ModesTrait;

    public $monthInfo = [
        'Baisakh' => [ '2022-04-14', '2022-05-14', ],
        'Jestha' => [ '2022-05-15', '2022-06-14', ],
        'Asadh' => [ '2022-06-15', '2022-07-16', ],
        'Shrawan' => [ '2022-07-17', '2022-08-16', ],
        'Bhadra' => [ '2022-08-17', '2022-09-16', ],
        'Ashwin' => [ '2022-09-17', '2022-10-17', ],
        'Kartik' => [ '2022-10-18', '2022-11-16', ],
        'Mangsir' => [ '2022-11-17', '2022-12-15', ],
        'Poush' => [ '2022-12-16', '2023-01-14', ],
        'Magh' => [ '2023-01-15', '2023-02-12', ],
        'Falgun' => [ '2023-02-13', '2023-03-14', ],
        'Chaitra' => [ '2023-03-15', '2023-04-13', ],
    ];

    public $monthBook = array();

    public $displayMonthName = 'Baisakh';
    public $startDay;
    public $endDay;

    public $modes = [
        'eventCreate' => false,
    ];

    public function render()
    {
        if ($this->displayMonthName == '') {
        } else {
            $this->populateMonthBook();
        }

        return view('livewire.school.cms.calendar-component');
    }

    public function selectMonth($monthName)
    {
        $this->displayMonthName = $monthName;
    }

    public function populateMonthBook()
    {
        $monthStartDate = $this->monthInfo[$this->displayMonthName][0];
        $monthEndDate = $this->monthInfo[$this->displayMonthName][1];

        $monthStartDay = Carbon::parse($monthStartDate);
        $monthEndDay = Carbon::parse($monthEndDate);

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

        if (count($events)) {
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

<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Traits\ModesTrait;
use App\SchoolCalendarEvent;

class CalendarComponent extends Component
{
    use ModesTrait;

    public $displayingCalendarEvent;

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

    public $monthInfo2080 = [
        'Baisakh' => [ '2023-04-14', '2023-05-14', ],
        'Jestha' => [ '2023-05-15', '2023-06-15', ],
        'Asadh' => [ '2023-06-16', '2023-07-16', ],
        'Shrawan' => [ '2023-07-17', '2023-08-17', ],
        'Bhadra' => [ '2023-08-18', '2023-09-17', ],
        'Ashwin' => [ '2023-09-18', '2023-10-17', ],
        'Kartik' => [ '2023-10-18', '2023-11-16', ],
        'Mangsir' => [ '2023-11-17', '2023-12-16', ],
        'Poush' => [ '2023-12-17', '2024-01-14', ],
        'Magh' => [ '2024-01-15', '2024-02-12', ],
        'Falgun' => [ '2024-02-13', '2024-03-13', ],
        'Chaitra' => [ '2024-03-14', '2024-04-12', ],
    ];

    public $monthInfo2081 = [
        'Baisakh' => [ '2024-04-13', '2024-05-13', ],
        'Jestha' => [ '2024-05-14', '2024-06-14', ],
        'Asadh' => [ '2024-06-15', '2024-07-15', ],
        'Shrawan' => [ '2024-07-16', '2024-08-16', ],
        'Bhadra' => [ '2024-08-17', '2024-09-16', ],
        'Ashwin' => [ '2024-09-17', '2024-10-16', ],
        'Kartik' => [ '2024-10-17', '2024-11-15', ],
        'Mangsir' => [ '2024-11-16', '2024-12-15', ],
        'Poush' => [ '2024-12-16', '2025-01-13', ],
        'Magh' => [ '2025-01-14', '2025-02-12', ],
        'Falgun' => [ '2025-02-13', '2025-03-13', ],
        'Chaitra' => [ '2025-03-14', '2025-04-13', ],
    ];

    public $monthInfo2082 = [
        'Baisakh' => [ '2025-04-14', '2025-05-14', ],
        'Jestha' => [ '2025-05-15', '2025-06-14', ],
        'Asadh' => [ '2025-06-15', '2025-07-16', ],
        'Shrawan' => [ '2025-07-17', '2025-08-16', ],
        'Bhadra' => [ '2025-08-17', '2025-09-16', ],
        'Ashwin' => [ '2025-09-17', '2025-10-17', ],
        'Kartik' => [ '2025-10-18', '2025-11-16', ],
        'Mangsir' => [ '2025-11-17', '2025-12-15', ],
        'Poush' => [ '2025-12-16', '2026-01-14', ],
        'Magh' => [ '2026-01-15', '2026-02-12', ],
        'Falgun' => [ '2026-02-13', '2026-03-14', ],
        'Chaitra' => [ '2026-03-15', '2026-04-13', ],
    ];

    public $monthBook = array();

    public $displayMonthName = '';
    public $startDay;
    public $endDay;

    public $eventCreationDay;

    public $modes = [
        'eventCreate' => false,
        'displayCalendarEventMode' => false,
    ];

    protected $listeners = [
        'calendarEventCreated',
        'exitCalendarEventCreate',
        'calendarEventDeleted',
    ];

    public function render(): View
    {
        if ($this->displayMonthName == '') {
        } else {
            $this->populateMonthBook();
        }

        return view('livewire.calendar.dashboard.calendar-component');
    }

    public function selectMonth($monthName): void
    {
        $this->displayMonthName = $monthName;
    }

    public function populateMonthBook(): void
    {
        $monthStartDate = $this->monthInfo2082[$this->displayMonthName][0];
        $monthEndDate = $this->monthInfo2082[$this->displayMonthName][1];

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

    public function exitCalendarEventCreate(): void
    {
        $this->exitMode('eventCreate');
    }

    public function calendarEventCreated(): void
    {
        $this->exitMode('eventCreate');
    }

    public function addEventForADate($day): void
    {
        $this->eventCreationDay = $day;

        $this->enterMode('eventCreate');
    }

    public function checkIfDayIsHoliday($day): bool
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

    public function getEventsForTheDay($day) // TODO: Type hinting of return type
    {
        $events = SchoolCalendarEvent::whereDate('start_date' , '<=', $day->toDateString())
            ->whereDate('end_date', '>=', $day->toDateString())
            ->get();

        return $events;
    }

    public function displayCalendarEvent(SchoolCalendarEvent $event): void
    {
        $this->displayingCalendarEvent = $event;
        $this->enterMode('displayCalendarEventMode');
    }

    public function calendarEventDeleted(): void
    {
        $this->exitMode('displayCalendarEventMode');
    }
}

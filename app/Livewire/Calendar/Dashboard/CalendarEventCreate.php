<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Traits\ModesTrait;
use App\Models\Calendar\SchoolCalendarEvent;
use App\Models\Calendar\CalendarGroup;
use App\Models\Calendar\SchoolCalendarEventCalendarGroup;

class CalendarEventCreate extends Component
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

    public $title;
    public $description;
    public $is_holiday;
    public $start_date;
    public $end_date;
    public $calendar_group_id;

    public $selectedStartDay;
    public $selectedEndDay;

    public $eventCreationDay = null;

    public $calendarGroups;

    public $modes = [
        'multiDay' => false,
        'allCalendarGroups' => true,
    ];

    protected $listeners = [
        'dateSelected',
    ];

    public function mount(): void
    {
        if ($this->eventCreationDay) {
            $this->start_date = $this->eventCreationDay;
            $this->end_date = $this->eventCreationDay;

            $this->selectedStartDay = $this->convertEnglishToNepaliDate($this->start_date);
            $this->selectedEndDay = $this->selectedStartDay;
        }

        $this->calendarGroups = CalendarGroup::all();
    }

    public function render(): View
    {
        return view('livewire.calendar.dashboard.calendar-event-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'nullable',
            'is_holiday' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'calendar_group_id' => 'nullable',
        ]);

        $calendarEvent = SchoolCalendarEvent::create($validatedData);


        if (! $this->modes['allCalendarGroups']) {

            /*
             * Record for which calendar group this event is for.
             *
             */

            $schoolCalendarEventCalendarGroup = new SchoolCalendarEventCalendarGroup;

            $schoolCalendarEventCalendarGroup->school_calendar_event_id = $calendarEvent->school_calendar_event_id;
            $schoolCalendarEventCalendarGroup->calendar_group_id = $validatedData['calendar_group_id'];

            $schoolCalendarEventCalendarGroup->save();
        }


        $this->dispatch('calendarEventCreated');
    }

    public function dateSelected($day, $nepaliMonth, $emitDate): void
    {
        if ($emitDate == 'start_date') {
            $this->start_date = $day[2];
            $this->selectedStartDay = $nepaliMonth . ' ' . $day[1];
        }

        if ($this->modes['multiDay']) {
            if ($emitDate == 'end_date') {
                $this->end_date = $day[2];
                $this->selectedEndDay = $nepaliMonth . ' ' . $day[1];
            }
        } else {
            $this->end_date = $this->start_date;
        }
    }

    public function convertNepaliToEnglishDate(): void
    {
        
    }

    public function convertEnglishToNepaliDate($englishDate): string
    {
        $nepaliYear = '';
        $nepaliMonth = '';
        $nepaliDate = '';

        foreach ($this->monthInfo2082 as $key => $val) {
            if ($englishDate >= $val[0] && $englishDate <= $val[1]) {
                $nepaliMonth = $nepaliMonth . $key;   
                break;
            }
        }

        $checkDay = Carbon::parse($englishDate);
        $day = Carbon::parse($this->monthInfo2082[$nepaliMonth][0]);

        /* Looping through 100 times, because month has only 30-ish days */
        for ($i=0; $i < 100; $i++) {
            if ($checkDay->toDateString() == $day->toDateString()) {
                $nepaliDate = $i + 1;
                break;
            }

            $day = $day->addDay();
        }

        return $nepaliMonth . ' ' . $nepaliDate;
    }
}

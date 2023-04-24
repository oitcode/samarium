<?php

namespace App\Http\Livewire\School;

use Livewire\Component;
use Carbon\Carbon;

use App\Traits\ModesTrait;

use App\SchoolCalendarEvent;

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

    public $title;
    public $description;
    public $is_holiday;
    public $start_date;
    public $end_date;

    public $selectedStartDay;
    public $selectedEndDay;

    public $eventCreationDay = null;

    public $modes = [
        'multiDay' => false,
    ];

    protected $listeners = [
        'dateSelected',
    ];

    public function mount()
    {
        if ($this->eventCreationDay) {
            $this->start_date = $this->eventCreationDay;
            $this->end_date = $this->eventCreationDay;

            $this->selectedStartDay = $this->convertEnglishToNepaliDate($this->start_date);
            $this->selectedEndDay = $this->selectedStartDay;
        }
    }

    public function render()
    {
        return view('livewire.school.calendar-event-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'nullable',
            'is_holiday' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        SchoolCalendarEvent::create($validatedData);

        $this->emit('calendarEventCreated');
    }

    public function dateSelected($day, $nepaliMonth, $emitDate)
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

    public function convertNepaliToEnglishDate()
    {
        
    }

    public function convertEnglishToNepaliDate($englishDate)
    {
        $nepaliYear = '';
        $nepaliMonth = '';
        $nepaliDate = '';

        foreach ($this->monthInfo2080 as $key => $val) {
            if ($englishDate >= $val[0] && $englishDate <= $val[1]) {
                $nepaliMonth = $nepaliMonth . $key;   
                break;
            }
        }

        $checkDay = Carbon::parse($englishDate);
        $day = Carbon::parse($this->monthInfo2080[$nepaliMonth][0]);

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

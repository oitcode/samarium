<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Traits\ModesTrait;
use App\SchoolCalendarEvent;

class CalendarEventEditDate extends Component
{
    use ModesTrait;

    public SchoolCalendarEvent $calendarEvent;

    public string $start_date;
    public string $end_date;

    public $modes = [
        'multiDay' => false,
    ];

    protected $listeners = [
        'dateSelected',
    ];

    public function render(): View
    {
        return view('livewire.calendar.dashboard.calendar-event-edit-date');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $this->calendarEvent->start_date = $validatedData['start_date'];
        $this->calendarEvent->end_date = $validatedData['end_date'];

        $this->calendarEvent->save();

        $this->dispatch('calendarEventUpdateDateCompleted');
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
}

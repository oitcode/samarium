<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\SchoolCalendarEvent;

class CalendarEventEditIsHoliday extends Component
{
    public SchoolCalendarEvent $calendarEvent;

    public string $is_holiday;

    public function mount(): void
    {
        $this->is_holiday = $this->calendarEvent->is_holiday;
    }

    public function render(): View
    {
        return view('livewire.calendar.dashboard.calendar-event-edit-is-holiday');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'is_holiday' => 'required',
        ]);

        $this->calendarEvent->is_holiday = $validatedData['is_holiday'];
        $this->calendarEvent->save();
        $this->dispatch('calendarEventUpdateIsHolidayCompleted');
    }
}

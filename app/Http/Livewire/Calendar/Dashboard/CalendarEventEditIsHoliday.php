<?php

namespace App\Http\Livewire\Calendar\Dashboard;

use Livewire\Component;

class CalendarEventEditIsHoliday extends Component
{
    public $calendarEvent;

    public $is_holiday;

    public function mount()
    {
        $this->is_holiday = $this->calendarEvent->is_holiday;
    }

    public function render()
    {
        return view('livewire.calendar.dashboard.calendar-event-edit-is-holiday');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'is_holiday' => 'required',
        ]);

        $this->calendarEvent->is_holiday = $validatedData['is_holiday'];
        $this->calendarEvent->save();
        $this->emit('calendarEventUpdateIsHolidayCompleted');
    }
}

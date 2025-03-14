<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\SchoolCalendarEvent;

class CalendarEventEditName extends Component
{
    public SchoolCalendarEvent $calendarEvent;

    public string $name;

    public function mount(): void
    {
        $this->name = $this->calendarEvent->title;
    }

    public function render(): View
    {
        return view('livewire.calendar.dashboard.calendar-event-edit-name');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->calendarEvent->title = $validatedData['name'];
        $this->calendarEvent->save();
        $this->dispatch('calendarEventUpdateNameCompleted');
    }
}

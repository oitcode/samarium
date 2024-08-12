<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;

class CalendarEventEditName extends Component
{
    public $calendarEvent;

    public $name;

    public function mount()
    {
        $this->name = $this->calendarEvent->title;
    }

    public function render()
    {
        return view('livewire.calendar.dashboard.calendar-event-edit-name');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->calendarEvent->title = $validatedData['name'];
        $this->calendarEvent->save();
        $this->dispatch('calendarEventUpdateNameCompleted');
    }
}

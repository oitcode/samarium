<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;

use App\CalendarGroup;

class CalendarGroupCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.calendar.dashboard.calendar-group-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
        ]);

        CalendarGroup::create($validatedData);

        $this->dispatch('calendarGroupCreateCompleted');
    }
}

<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\CalendarGroup;

class CalendarGroupCreate extends Component
{
    public $name;

    public function render(): View
    {
        return view('livewire.calendar.dashboard.calendar-group-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
        ]);

        CalendarGroup::create($validatedData);

        $this->dispatch('calendarGroupCreateCompleted');
    }
}

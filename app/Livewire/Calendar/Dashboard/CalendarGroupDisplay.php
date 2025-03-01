<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class CalendarGroupDisplay extends Component
{
    public $calendarGroup;

    public function render(): View
    {
        return view('livewire.calendar.dashboard.calendar-group-display');
    }

    public function closeThisComponent(): void
    {
        $this->dispatch('calendarGroupDisplayCancelled');
    }
}

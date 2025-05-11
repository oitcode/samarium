<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Services\Calendar\CalendarGroupService;
use App\CalendarGroup;

/**
 * CalendarGroupCreate Livewire Component
 *
 * This component handles the creation of calendar group
 * from application dashboard.
 *
 */
class CalendarGroupCreate extends Component
{
    public $name;

    /**
     * Render the component's view.
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view('livewire.calendar.dashboard.calendar-group-create');
    }

    /**
     * Create a new calendar group.
     *
     * Validates the input data, creates the calendar group using the service,
     * and dispatches a completion event.
     *
     * @param CalendarGroupService $calendarGroupService
     * @return void
     */
    public function store(CalendarGroupService $calendarGroupService): void
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
        ]);

        $calendarGroupService->createCalendarGroup($validatedData);

        $this->dispatch('calendarGroupCreateCompleted');
    }
}

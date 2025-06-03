<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;

class CalendarEventDisplay extends Component
{
    use ModesTrait;

    public $calendarEvent;

    public $modes = [
        'editNameMode' => false,
        'editDateMode' => false,
        'editIsHolidayMode' => false,

        'deleteMode' => false,
    ];

    protected $listeners = [
        'calendarEventUpdateNameCancelled',
        'calendarEventUpdateNameCompleted',

        'calendarEventUpdateIsHolidayCancelled',
        'calendarEventUpdateIsHolidayCompleted',

        'calendarEventUpdateDateCancelled',
        'calendarEventUpdateDateCompleted',
    ];

    public function render(): View
    {
        return view('livewire.calendar.dashboard.calendar-event-display');
    }

    public function calendarEventUpdateNameCancelled(): void
    {
        $this->exitMode('editNameMode');
    }

    public function calendarEventUpdateNameCompleted(): void
    {
        $this->exitMode('editNameMode');
    }

    public function calendarEventUpdateIsHolidayCancelled(): void
    {
        $this->exitMode('editIsHolidayMode');
    }

    public function calendarEventUpdateIsHolidayCompleted(): void
    {
        $this->exitMode('editIsHolidayMode');
    }

    public function calendarEventUpdateDateCancelled(): void
    {
        $this->exitMode('editDateMode');
    }

    public function calendarEventUpdateDateCompleted(): void
    {
        $this->exitMode('editDateMode');
    }

    public function deleteEvent() // TODO: Type hinting of return type
    {
        $this->calendarEvent->delete();

        session()->flash('message', 'Calendar event deleted.');

        /*
         * Is this a good approach? Instead of redirecting cant we just emit some event 
         * and do something better?
         *
         */
        return redirect()->to('/dashboard/school/calendar');
    }
}

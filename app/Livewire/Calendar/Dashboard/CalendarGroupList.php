<?php

namespace App\Livewire\Calendar\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Calendar\CalendarGroupService;
use App\Models\Calendar\CalendarGroup;

/**
 * CalendarGroupList Component
 * 
 * This Livewire component handles the listing of calendar groups.
 */
class CalendarGroupList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Calendar group per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of calendar groups
     *
     * @var int
     */
    public $totalCalendarGroupCount;

    /**
     * Calendar group which needs to be deleted
     *
     * @var CalendarGroup
     */
    public $deletingCalendarGroup;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false,
        'cannotDelete' => false,
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(CalendarGroupService $calendarGroupService): View
    {
        $calendarGroups = $calendarGroupService->getPaginatedCalendarGroups($this->perPage);
        $this->totalCalendarGroupCount = $calendarGroupService->getTotalCalendarGroupCount();

        return view('livewire.calendar.dashboard.calendar-group-list', [
            'calendarGroups' => $calendarGroups,
        ]);
    }

    /**
     * Confirm if user really wants to delete a calendar group
     *
     * @return void
     */
    public function confirmDeleteCalendarGroup(int $calendar_group_id, CalendarGroupService $calendarGroupService): void
    {
        $this->deletingCalendarGroup = CalendarGroup::find($calendar_group_id);

        if ($calendarGroupService->canDeleteCalendarGroup($calendar_group_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel calendar group delete
     *
     * @return void
     */
    public function cancelDeleteCalendarGroup(): void
    {
        $this->deletingCalendarGroup = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a calendar group cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteCalendarGroup(): void
    {
        $this->deletingCalendarGroup = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete calendar group
     *
     * @return void
     */
    public function deleteCalendarGroup(CalendarGroupService $calendarGroupService): void
    {
        $calendarGroupService->deleteCalendarGroup($this->deletingCalendarGroup->calendar_group_id);
        $this->deletingCalendarGroup = null;
        $this->exitMode('confirmDelete');
    }
}

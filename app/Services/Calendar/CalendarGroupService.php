<?php

namespace App\Services\Calendar;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Calendar\CalendarGroup;

class CalendarGroupService
{
    /**
     * Get paginated list of calendar groups
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedCalendarGroups(int $perPage = 5): LengthAwarePaginator
    {
        return CalendarGroup::paginate($perPage);
    }

    /**
     * Create a new calendar group
     *
     * @param array $data
     * @return CalendarGroup
     */
    public function createCalendarGroup(array $data): CalendarGroup
    {
        return CalendarGroup::create($data);
    }

    /**
     * Check if a calendar group can be deleted.
     *
     * @param int $calendar_group_id
     * @return void
     */
    public function canDeleteCalendarGroup(int $calendar_group_id): bool
    {
        $calendarGroup = CalendarGroup::find($calendar_group_id);

        if (count($calendarGroup->schoolCalendarEvents) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete calendar group
     *
     * @param int $calendar_group_id
     * @return void
     */
    public function deleteCalendarGroup(int $calendar_group_id): void
    {
        // Todo: Many related rows from other tables must be
        //       deleted before deleting the post. This
        //       case must be handled soon.
        $calendarGroup = CalendarGroup::find($calendar_group_id);

        $calendarGroup->delete();
    }

    /**
     * Get total calendar group count
     *
     * @return int
     */
    public function getTotalCalendarGroupCount(): int
    {
        return CalendarGroup::count();
    }
}

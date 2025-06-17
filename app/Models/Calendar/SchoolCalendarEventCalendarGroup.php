<?php

namespace App\Models\Calendar;

use Illuminate\Database\Eloquent\Model;

class SchoolCalendarEventCalendarGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'school_calendar_event__calendar_group';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'school_calendar_event__calendar_group_id';

    protected $fillable = [
         'school_calendar_event_id', 'calendar_group_id',
    ];
}

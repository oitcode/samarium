<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolCalendarEvent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'school_calendar_event';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'school_calendar_event_id';

    protected $fillable = [
         'title', 'description', 'is_holiday',
         'start_date', 'end_date',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */


    /*
     * calendar_group table.
     *
     */
    public function calendarGroups()
    {
        return $this->belongsToMany(
            'App\CalendarGroup',
            'school_calendar_event__calendar_group',
            'school_calendar_event_id', 'calendar_group_id'
        );
    }
}

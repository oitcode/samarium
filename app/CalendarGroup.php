<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendar_group';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'calendar_group_id';

    protected $fillable = [
         'name',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * school_calendar_event table.
     *
     */
    public function schoolCalendarEvents()
    {
        return $this->belongsToMany(
            'App\SchoolCalendarEvent',
            'school_calendar_event__calendar_group',
            'calendar_group_id', 'school_calendar_event_id'
        );
    }
}

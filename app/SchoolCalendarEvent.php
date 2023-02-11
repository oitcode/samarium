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
}

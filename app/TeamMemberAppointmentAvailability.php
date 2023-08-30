<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMemberAppointmentAvailability extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'team_member_appointment_availability';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'team_member_appointment_availability_id';

    protected $fillable = [
         'team_member_id', 'day', 'start_time', 'end_time',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * team_member table.
     *
     */
    public function teamMember()
    {
        return $this->belongsTo('App\TeamMember', 'team_member_id', 'team_member_id');
    }
}

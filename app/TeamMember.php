<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'team_member';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'team_member_id';

    protected $fillable = [
         'name', 'phone',
         'email', 'comment',
         'team_id', 'position',
         'image_path',
         'address',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * team table.
     *
     */
    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id', 'team_id');
    }

    /*
     * team_member_appointment_availability table.
     *
     */
    public function teamMemberAppointmentAvailabilities()
    {
        return $this->hasMany('App\TeamMemberAppointmentAvailability', 'team_member_id', 'team_member_id');
    }

    /*
     * appointment table.
     *
     */
    public function appointments()
    {
        return $this->hasMany('App\Appointment', 'team_member_id', 'team_member_id');
    }
}

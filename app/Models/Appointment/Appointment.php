<?php

namespace App\Models\Appointment;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'appointment';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'appointment_id';

    protected $fillable = [
         'team_member_id', 'appointment_date_time',
         'applicant_name', 'applicant_phone', 'applicant_description',
         'status',
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
        return $this->belongsTo('App\Models\Team\TeamMember', 'team_member_id', 'team_member_id');
    }
}

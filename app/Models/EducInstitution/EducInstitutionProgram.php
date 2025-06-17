<?php

namespace App\Models\EducInstitution;

use Illuminate\Database\Eloquent\Model;

class EducInstitutionProgram extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'educ_institution_program';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'educ_institution_program_id';

    protected $fillable = [
         'name', 'program_type', 'educ_institution_id', 'creator_id',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * users table.
     *
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User\User', 'creator_id', 'id');
    }

    /*
     * educ_institution table.
     *
     */
    public function educInstitution()
    {
        return $this->belongsTo('App\Models\EducInstitution\EducInstitution', 'educ_institution_id', 'educ_institution_id');
    }

    /*
     * educ_application table.
     *
     */
    public function educApplications()
    {
        return $this->hasMany('App\Models\EducInstitution\EducApplication', 'educ_institution_program_id', 'educ_institution_program_id');
    }
}

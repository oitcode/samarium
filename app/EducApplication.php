<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducApplication extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'educ_application';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'educ_application_id';

    protected $fillable = [
         'status', 'customer_id', 'educ_institution_program_id', 'creator_id',
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
     * educ_institution_program table.
     *
     */
    public function educInstitutionProgram()
    {
        return $this->belongsTo('App\EducInstitutionProgram', 'educ_institution_program_id', 'educ_institution_program_id');
    }

    /*
     * customer table.
     *
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'customer_id');
    }
}

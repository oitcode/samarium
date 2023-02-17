<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'team';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'team_id';

    protected $fillable = [
         'name', 'team_type', 'comment', 'image_path',
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
    public function teamMembers()
    {
        return $this->hasMany('App\TeamMember', 'team_id', 'team_id');
    }
}

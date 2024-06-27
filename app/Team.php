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

    /*
     * webpage table.
     *
     */
    public function webPages()
    {
        return $this->belongsToMany('App\Webpage', 'webpage__team', 'team_id', 'webpage_id');
    }


    /*-------------------------------------------------------------------------
     * Other methods
     *-------------------------------------------------------------------------
     *
     */
    public function getMaxPosition()
    {
        $lastTeamMember = $this->teamMembers()->orderBy('position', 'desc')->first();

        if ($lastTeamMember) {
            return $lastTeamMember->position;
        } else {
            return null;
        }
    }
}

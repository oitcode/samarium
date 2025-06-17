<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlLink extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'url_link';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'url_link_id';

    protected $fillable = [
         'url', 'description', 'creator_id',
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
     * user_group table.
     *
     */
    public function userGroups()
    {
        return $this->belongsToMany('App\Models\User\UserGroup', 'url_link__user_group', 'url_link_id', 'user_group_id');
    }
}

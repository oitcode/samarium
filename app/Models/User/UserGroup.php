<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_group';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'user_group_id';

    protected $fillable = [
         'user_id','user_group_id', 
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
     * user table.
     *
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User\User', 'user__user_group', 'user_group_id', 'user_id');
    }

    /*
     * document_file table.
     *
     */
    public function documentFiles()
    {
        return $this->belongsToMany('App\Models\DocumentFile\DocumentFile', 'document_file__user_group', 'user_group_id', 'document_file_id');
    }

    /*
     * url_link table.
     *
     */
    public function urlLinks()
    {
        return $this->belongsToMany('App\Models\UrlLink\UrlLink', 'url_link__user_group', 'user_group_id', 'url_link_id');
    }
}

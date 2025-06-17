<?php

namespace App\Models\DocumentFile;

use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'document_file';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'document_file_id';

    protected $fillable = [
         'name', 'file_path', 'description', 'creator_id',
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
        return $this->belongsToMany('App\Models\User\UserGroup', 'document_file__user_group', 'document_file_id', 'user_group_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'todo';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'todo_id';

    protected $fillable = [
         'title', 'description',
         'status', 'creator_id',
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
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }

}

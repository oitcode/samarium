<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUserGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user__user_group';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'user__user_group_id';

    protected $fillable = [
         'user_id', 'user_group_id',
    ];
}

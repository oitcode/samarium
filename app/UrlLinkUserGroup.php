<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlLinkUserGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'url_link__user_group';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'url_link__user_group_id';

    protected $fillable = [
         'url_link_id', 'user_group_id',
    ];
}

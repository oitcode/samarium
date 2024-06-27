<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebpageTeam extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webpage__team';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'webpage__team_id';

    protected $fillable = [
         'webpage_id', 'team_id',
    ];
}

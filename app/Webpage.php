<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webpage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webpage';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'webpage_id';

    protected $fillable = [
         'permalink', 'public',
    ];
}

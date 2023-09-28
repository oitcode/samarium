<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vacancy';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'vacancy_id';

    protected $fillable = [
         'title', 'description', 'status',
    ];
}

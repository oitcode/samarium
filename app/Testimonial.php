<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'testimonial';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'testimonial_id';

    protected $fillable = [
      'writer_name', 'writer_info', 'body',
    ];
}

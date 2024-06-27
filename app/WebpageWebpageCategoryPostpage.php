<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebpageWebpageCategoryPostpage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webpage__webpage_category___postpage';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'webpage__webpage_category___postpage_id';

    protected $fillable = [
         'webpage_id', 'webpage_category_id',
    ];
}

<?php

namespace App\Models\Cms\Webpage;

use Illuminate\Database\Eloquent\Model;

class WebpageWebpageCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webpage__webpage_category';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'webpage__webpage_category_id';

    protected $fillable = [
         'webpage_id', 'webpage_category_id',
    ];
}

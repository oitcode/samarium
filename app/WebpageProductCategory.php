<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebpageProductCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webpage__product_category';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'webpage__product_category_id';

    protected $fillable = [
         'webpage_id', 'product_category_id',
    ];
}

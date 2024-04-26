<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_feature';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_feature_id';

    protected $fillable = [
         'feature', 'position', 'product_id',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * product table.
     *
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }
}

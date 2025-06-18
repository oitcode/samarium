<?php

namespace App\Models\Product;

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
         'feature', 'position', 'product_id', 'product_feature_heading_id',
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
        return $this->belongsTo('App\Models\Product\Product', 'product_id', 'product_id');
    }

    /*
     * product_feature_heading table.
     *
     */
    public function productFeatureHeading()
    {
        return $this->belongsTo('App\Models\Product\ProductFeatureHeading', 'product_feature_heading_id', 'product_feature_heading_id');
    }
}

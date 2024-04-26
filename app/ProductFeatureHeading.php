<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeatureHeading extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_feature_heading';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_feature_heading_id';

    protected $fillable = [
         'feature_heading', 'position', 'product_id',
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

    /*
     * product_feature table.
     *
     */
    public function productFeatures()
    {
        return $this->hasMany('App\ProductFeature', 'product_feature_heading_id', 'product_feature_heading_id');
    }
}

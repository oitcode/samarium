<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSpecificationHeading extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_specification_heading';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_specification_heading_id';

    protected $fillable = [
         'specification_heading', 'position', 'product_id',
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
     * product_specification table.
     *
     */
    public function productSpecifications()
    {
        return $this->hasMany('App\ProductSpecification', 'product_specification_heading_id', 'product_specification_heading_id');
    }
}

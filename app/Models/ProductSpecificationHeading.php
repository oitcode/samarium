<?php

namespace App\Models;

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
        return $this->belongsTo('App\Models\Product', 'product_id', 'product_id');
    }

    /*
     * product_specification table.
     *
     */
    public function productSpecifications()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_specification_heading_id', 'product_specification_heading_id');
    }
}

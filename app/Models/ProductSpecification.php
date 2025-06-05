<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_specification';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_specification_id';

    protected $fillable = [
         'product_id', 'position', 'spec_heading', 'spec_value',
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
     * product_specification_heading table.
     *
     */
    public function productSpecificationHeading()
    {
        return $this->belongsTo('App\Models\ProductSpecificationHeading', 'product_specification_heading_id', 'product_specification_heading_id');
    }
}

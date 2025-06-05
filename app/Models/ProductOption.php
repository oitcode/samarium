<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_option';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_option_id';

    protected $fillable = [
         'product_option_name', 'position', 'product_id', 'product_option_heading_id',
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
     * product_option_heading table.
     *
     */
    public function productOptionHeading()
    {
        return $this->belongsTo('App\Models\ProductOptionHeading', 'product_option_heading_id', 'product_option_heading_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_enquiry';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_enquiry_id';

    protected $fillable = [
         'product_id',
         'writer_name',
         'writer_email', 'writer_phone',
         'enquiry_text',
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
}

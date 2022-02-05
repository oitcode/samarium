<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'purchase_id';

    protected $fillable = [
         'vendor_id',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * vendor table.
     *
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id', 'vendor_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteOrder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_order';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'website_order_id';

    protected $fillable = [
         'phone', 'address', 'status',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * purchase table.
     *
     */
    /*
    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'vendor_id', 'vendor_id');
    }
    */
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'customer_id';

    protected $fillable = [
         'name', 'phone',
         'email', 'address',
         'pan_num',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale table.
     *
     */
    public function sales()
    {
        return $this->hasMany('App\Sale', 'customer_id', 'customer_id');
    }
}

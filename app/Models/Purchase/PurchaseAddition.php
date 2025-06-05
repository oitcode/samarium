<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseAddition extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase_addition';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'purchase_addition_id';

    protected $fillable = [
         'purchase_id', 'purchase_addition_heading_id',
         'amount',
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
    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase\Purchase', 'purchase_id', 'purchase_id');
    }

    /*
     * purchase_addition_heading table.
     *
     */
    public function purchaseAdditionHeading()
    {
        return $this->belongsTo('App\Models\Purchase\PurchaseAdditionHeading', 'purchase_addition_heading_id', 'purchase_addition_heading_id');
    }
}

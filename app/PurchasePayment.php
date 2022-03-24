<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasePayment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase_payment';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'purchase_payment_id';

    protected $fillable = [
         'purchase_payment_type_id', 'purchase_id', 'payment_date',
         'amount',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * purchase_payment_type table.
     *
     */
    public function purchasePaymentType()
    {
        return $this->belongsTo('App\PurchasePaymentType', 'purchase_payment_type_id', 'purchase_payment_type_id');
    }

    /*
     * sale_invoice table.
     *
     */
    public function purchase()
    {
        return $this->belongsTo('App\Purchase', 'purchase_id', 'purchase_id');
    }
}

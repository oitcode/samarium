<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasePaymentType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase_payment_type';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'purchase_payment_type_id';

    protected $fillable = [
         'name',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * purchase_payment table.
     *
     */
    public function purchasePayments()
    {
        return $this->hasMany('App\PurchasePayment', 'purchase_payment_type_id', 'purchase_payment_type_id');
    }
}

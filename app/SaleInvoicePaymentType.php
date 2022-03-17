<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoicePaymentType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_invoice_payment_type';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_invoice_payment_type_id';

    protected $fillable = [
         'name',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale_invoice_payment table.
     *
     */
    public function saleInvoicePayments()
    {
        return $this->hasMany('App\SaleInvoicePayment', 'sale_invoice_payment_type_id', 'sale_invoice_payment_type_id');
    }
}

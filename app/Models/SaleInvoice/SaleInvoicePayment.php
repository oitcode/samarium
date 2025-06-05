<?php

namespace App\Models\SaleInvoice;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleInvoicePayment extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_invoice_payment';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_invoice_payment_id';

    protected $fillable = [
         'sale_invoice_payment_type_id', 'sale_invoice_id', 'payment_date',
         'amount',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale_invoice_payment_type table.
     *
     */
    public function saleInvoicePaymentType()
    {
        return $this->belongsTo('App\Models\SaleInvoice\SaleInvoicePaymentType', 'sale_invoice_payment_type_id', 'sale_invoice_payment_type_id');
    }

    /*
     * sale_invoice table.
     *
     */
    public function saleInvoice()
    {
        return $this->belongsTo('App\Models\SaleInvoice\SaleInvoice', 'sale_invoice_id', 'sale_invoice_id');
    }
}

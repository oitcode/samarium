<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_invoice';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_invoice_id';

    protected $fillable = [
         'invoice_date', 'customer_id',
         'total_amount', 'payment_status',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * customer table.
     *
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'customer_id');
    }

    /*
     * sale_invoice_item table.
     *
     */
    public function saleInvoiceItems()
    {
        return $this->hasMany('App\SaleInvoiceItem', 'sale_invoice_id', 'sale_invoice_id');
    }

    /*
     * sale_invoice_payment table.
     *
     */
    public function saleInvoicePayments()
    {
        return $this->hasMany('App\SaleInvoicePayment', 'sale_invoice_id', 'sale_invoice_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    /*
     * Get total amount.
     *
     */
    public function getTotalAmount()
    {
        $total = 0;

        foreach ($this->saleInvoiceItems as $saleInvoiceItem) {
            $totalPrice = $saleInvoiceItem->product->selling_price * $saleInvoiceItem->quantity;;
            $total += $totalPrice;
        }

        return $total;
    }
}

<?php

namespace App\Models\SaleInvoice;

use Illuminate\Database\Eloquent\Model;

class SaleInvoiceAddition extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_invoice_addition';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_invoice_addition_id';

    protected $fillable = [
         'sale_invoice_id', 'sale_invoice_addition_heading_id',
         'amount',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale_invoice table.
     *
     */
    public function saleInvoice()
    {
        return $this->belongsTo('App\Models\SaleInvoice\SaleInvoice', 'sale_invoice_id', 'sale_invoice_id');
    }

    /*
     * sale_invoice_addition_heading table.
     *
     */
    public function saleInvoiceAdditionHeading()
    {
        return $this->belongsTo('App\Models\SaleInvoice\SaleInvoiceAdditionHeading', 'sale_invoice_addition_heading_id', 'sale_invoice_addition_heading_id');
    }
}

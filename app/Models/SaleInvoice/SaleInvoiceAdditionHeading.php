<?php

namespace App\Models\SaleInvoice;

use Illuminate\Database\Eloquent\Model;

class SaleInvoiceAdditionHeading extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_invoice_addition_heading';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_invoice_addition_heading_id';

    protected $fillable = [
         'name', 'effect',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale_invoice_addition table.
     *
     */
    public function saleInvoiceAdditions()
    {
        return $this->hasMany('App\Models\SaleInvoice\SaleInvoiceAddition', 'sale_invoice_addition_heading_id', 'sale_invoice_addition_heading_id');
    }
}

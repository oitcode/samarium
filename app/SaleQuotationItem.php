<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleQuotationItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_quotation_item';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_quotation_item_id';

    protected $fillable = [
         'sell_quotation_id',
         'product_id', 'quantity',
         'unit', 'price_per_unit', 'price_total',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale_quotation table.
     *
     */
    public function saleQuotation()
    {
        return $this->belongsTo('App\SaleQuotation', 'sale_quotation_id', 'sale_quotation_id');
    }

    /*
     * product table.
     *
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    /*
     * get total amount.
     *
     */
    public function getTotalAmount()
    {
        return $this->price_per_unit * $this->quantity;
    }
}

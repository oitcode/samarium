<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_id';

    protected $fillable = [
         'name', 'product_category_id',
         'selling_price',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * product_category table.
     *
     */
    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory', 'product_category_id', 'product_category_id');
    }

    /*
     * sale_invoice_item table.
     *
     */
    public function saleInvoiceItems()
    {
        return $this->hasMany('App\SaleInvoiceItem', 'product_id', 'product_id');
    }

    /*
     * seat_table_booking_item table.
     *
     */
    public function seatTableBookingItems()
    {
        return $this->hasMany('App\SeatTableBookingItem', 'product_id', 'product_id');
    }
}

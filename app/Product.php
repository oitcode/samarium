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
         'name', 'product_category_id', 'base_product_id',
         'description', 'selling_price', 'stock_count',
         'image_path', 'stock_applicable',
         'inventory_unit', 'inventory_unit_consumption',
         'is_active', 'is_base_product',
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
     * product table.
     *
     * Yes, this table has a relation with itself. Some products have
     * base products to which they are subproduct.
     *
     */
    public function baseProduct()
    {
        return $this->belongsTo('App\Product', 'base_product_id', 'product_id');
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

    /*
     * website_order table.
     *
     */
    /*
    public function websiteOrders()
    {
        return $this->hasMany('App\WebsiteOrder', 'product_id', 'product_id');
    }
    */

    /*
     * website_order table.
     *
     */
    public function websiteOrderItems()
    {
        return $this->hasMany('App\WebsiteOrderItems', 'product_id', 'product_id');
    }

    /*
     * purchase_item table.
     *
     */
    public function purchaseItems()
    {
        return $this->hasMany('App\PurchaseItem', 'product_id', 'product_id');
    }
}

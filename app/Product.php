<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
         'is_active', 'show_in_front_end',
         'is_base_product', 'stock_notification_count',
         'opening_stock_count', 'opening_stock_timestamp',
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
     * product_review table.
     *
     */
    public function productReviews()
    {
        return $this->hasMany('App\ProductReview', 'product_id', 'product_id');
    }

    /*
     * product_question table.
     *
     */
    public function productQuestions()
    {
        return $this->hasMany('App\ProductQuestion', 'product_id', 'product_id');
    }

    /*
     * gallery table.
     *
     */
    public function gallery()
    {
        return $this->hasOne('App\Gallery', 'gallery_id', 'gallery_id');
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
     * product table.
     *
     * Yes, this table has a relation with itself. Base products
     * will have sub products.
     *
     */
    public function subProducts()
    {
        return $this->hasMany('App\Product', 'base_product_id', 'product_id');
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

    /*
     * product_specification table.
     *
     */
    public function productSpecifications()
    {
        return $this->hasMany('App\ProductSpecification', 'product_id', 'product_id');
    }

    public function isUsedToday()
    {
        $openingStockTimestamp = $this->opening_stock_timestamp;

        if (
            count($this->purchaseItems()
                ->whereHas('purchase',
                    function (Builder $query)
                      use($openingStockTimestamp) {
                        $query->where('created_at', '>', $openingStockTimestamp)
                            ->where('purchase_date',  date('Y-m-d'));
                })->get()) > 0

        ) {
            return true;
        }

        if (
            count($this->saleInvoiceItems()
                ->whereHas('saleInvoice',
                    function (Builder $query)
                      use($openingStockTimestamp) {
                        $query->where('created_at', '>', $openingStockTimestamp)
                            ->where('sale_invoice_date',  date('Y-m-d'));
                })->get()) > 0

        ) {
            return true;
        }

        return false;
    }

    public function getLastSpecPosition()
    {
        $highest = 0;

        foreach ($this->productSpecifications as $productSpecification) {
            if ($productSpecification->position > $highest) {
                $highest = $productSpecification->position;
            }
        }

        return $highest;
    }

    public function getStarReviewCount($stars)
    {
        return $this->productReviews()->where('rating', $stars)->count();
    }
}

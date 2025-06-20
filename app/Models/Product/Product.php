<?php

namespace App\Models\Product;

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
         'name', 'product_category_id', 'product_vendor_id', 'base_product_id',
         'description', 'selling_price', 'selling_price_unit', 'stock_count',
         'image_path', 'stock_applicable',
         'inventory_unit', 'inventory_unit_consumption',
         'is_active', 'show_in_front_end',
         'is_base_product', 'stock_notification_count',
         'opening_stock_count', 'opening_stock_timestamp',
         'featured_product',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * product_category table.
     */
    public function productCategory()
    {
        return $this->belongsTo('App\Models\Product\ProductCategory', 'product_category_id', 'product_category_id');
    }

    /*
     * product_vendor table.
     */
    public function productVendor()
    {
        return $this->belongsTo('App\Models\Product\ProductVendor', 'product_vendor_id', 'product_vendor_id');
    }

    /*
     * product_review table.
     */
    public function productReviews()
    {
        return $this->hasMany('App\Models\Product\ProductReview', 'product_id', 'product_id');
    }

    /*
     * product_question table.
     */
    public function productQuestions()
    {
        return $this->hasMany('App\Models\Product\ProductQuestion', 'product_id', 'product_id');
    }

    /*
     * product_enquiry table.
     */
    public function productEnquiries()
    {
        return $this->hasMany('App\Models\Product\ProductEnquiry', 'product_id', 'product_id');
    }

    /*
     * gallery table.
     */
    public function gallery()
    {
        return $this->hasOne('App\Models\Gallery\Gallery', 'gallery_id', 'gallery_id');
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
        return $this->belongsTo('App\Models\Product\Product', 'base_product_id', 'product_id');
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
        return $this->hasMany('App\Models\Product\Product', 'base_product_id', 'product_id');
    }

    /*
     * sale_invoice_item table.
     */
    public function saleInvoiceItems()
    {
        return $this->hasMany('App\Models\SaleInvoice\SaleInvoiceItem', 'product_id', 'product_id');
    }

    /*
     * sale_quotation_item table.
     */
    public function saleQuotationItems()
    {
        return $this->hasMany('App\Models\SaleQuotation\SaleQuotationItem', 'product_id', 'product_id');
    }

    /*
     * seat_table_booking_item table.
     */
    public function seatTableBookingItems()
    {
        return $this->hasMany('App\Models\SeatTable\SeatTableBookingItem', 'product_id', 'product_id');
    }

    /*
     * website_order table.
     */
    /*
    public function websiteOrders()
    {
        return $this->hasMany('App\WebsiteOrder', 'product_id', 'product_id');
    }
    */

    /*
     * website_order table.
     */
    public function websiteOrderItems()
    {
        return $this->hasMany('App\Models\WebsiteOrder\WebsiteOrderItems', 'product_id', 'product_id');
    }

    /*
     * purchase_item table.
     */
    public function purchaseItems()
    {
        return $this->hasMany('App\Models\Purchase\PurchaseItem', 'product_id', 'product_id');
    }

    /*
     * product_specification_heading table.
     */
    public function productSpecificationHeadings()
    {
        return $this->hasMany('App\Models\Product\ProductSpecificationHeading', 'product_id', 'product_id');
    }

    /*
     * product_specification table.
     */
    public function productSpecifications()
    {
        return $this->hasMany('App\Models\Product\ProductSpecification', 'product_id', 'product_id');
    }

    /*
     * product_feature_heading table.
     */
    public function productFeatureHeadings()
    {
        return $this->hasMany('App\Models\Product\ProductFeatureHeading', 'product_id', 'product_id');
    }

    /*
     * product_feature table.
     */
    public function productFeatures()
    {
        return $this->hasMany('App\Models\Product\ProductFeature', 'product_id', 'product_id');
    }

    /*
     * product_option_heading table.
     */
    public function productOptionHeadings()
    {
        return $this->hasMany('App\Models\Product\ProductOptionHeading', 'product_id', 'product_id');
    }

    /*
     * product_option table.
     */
    public function productOptions()
    {
        return $this->hasMany('App\Models\Product\ProductOption', 'product_id', 'product_id');
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

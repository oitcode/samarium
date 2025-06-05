<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteOrderItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_order_item';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'website_order_item_id';

    protected $fillable = [
         'website_order_id', 'product_id', 'quantity',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * website_order table.
     *
     */
    public function websiteOrder()
    {
        return $this->belongsTo('App\WebsiteOrder', 'website_order_id', 'website_order_id');
    }

    /*
     * product table.
     *
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'product_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */
    
    public function getTotalAmount()
    {
        $total = $this->product->selling_price * $this->quantity;

        return $total;
    }
}

<?php

namespace App\Models\WebsiteOrder;

use Illuminate\Database\Eloquent\Model;

class WebsiteOrder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_order';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'website_order_id';

    protected $fillable = [
         'phone', 'address', 'status', 'product_id',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * product table.
     *
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'product_id');
    }

    /*
     * website_order_item table.
     *
     */
    public function websiteOrderItems()
    {
        return $this->hasMany('App\Models\WebsiteOrder\WebsiteOrderItem', 'website_order_id', 'website_order_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */
    
    public function getTotalAmount()
    {
        $total = 0;

        foreach ($this->websiteOrderItems as $item) {
            $total += $item->getTotalAmount();
        }

        return $total;
    }
}

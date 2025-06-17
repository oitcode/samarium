<?php

namespace App\Models\Unused;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_id';

    protected $fillable = [
         'customer_id',
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
        return $this->belongsTo('App\Models\Customer\Customer', 'customer_id', 'customer_id');
    }

    /*
     * sale_item table.
     *
     */
    public function saleItems()
    {
        return $this->hasMany('App\Models\Unused\SaleItem', 'sale_id', 'sale_id');
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

        foreach ($this->saleItems as $saleItem) {
            $total += $saleItem->amount;
        }

        return $total;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendor';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'vendor_id';

    protected $fillable = [
         'name', 'ab_account_id',
         'phone', 'email', 'address',
         'pan_num',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * purchase table.
     *
     */
    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'vendor_id', 'vendor_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    /*
     * get balance.
     *
     */
    public function getBalance()
    {
        $total = 0;

        foreach ($this->purchases as $purchase) {
            $total += $purchase->getPendingAmount();
        }

        return $total;
    }

    public function getPendingPurchases()
    {
        $purchases = $this->purchases()->where('payment_status', '!=', 'paid')->get();

        return $purchases;
    }
}

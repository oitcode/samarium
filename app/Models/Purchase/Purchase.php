<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'purchase_id';

    protected $fillable = [
         'vendor_id', 'payment_status',
         'creator_id', 'creation_status',
         'purchase_date',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */


    /*
     * users table.
     *
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    /*
     * vendor table.
     *
     */
    public function vendor()
    {
        return $this->belongsTo('App\Vendor', 'vendor_id', 'vendor_id');
    }

    /*
     * purchase_item table.
     *
     */
    public function purchaseItems()
    {
        return $this->hasMany('App\Models\Purchase\PurchaseItem', 'purchase_id', 'purchase_id');
    }

    /*
     * purchase_payment table.
     *
     */
    public function purchasePayments()
    {
        return $this->hasMany('App\Models\Purchase\PurchasePayment', 'purchase_id', 'purchase_id');
    }

    /*
     * purchase_addition table.
     *
     */
    public function purchaseAdditions()
    {
        return $this->hasMany('App\Models\Purchase\PurchaseAddition', 'purchase_id', 'purchase_id');
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


        foreach ($this->purchaseItems as $purchaseItem) {
            $total += $purchaseItem->getTotalAmount();
        }

        foreach ($this->purchaseAdditions as $purchaseAddition)  {
            if (strtolower($purchaseAddition->purchaseAdditionHeading->effect) == 'plus') {
                $total += $purchaseAddition->amount;
            } else if (strtolower($purchaseAddition->purchaseAdditionHeading->effect) == 'minus') {
                $total -= $purchaseAddition->amount;
            } else {
              // Todo
            }
        }

        return $total;
    }

    /*
     * Get pending amount.
     *
     */
    public function getPendingAmount()
    {
        $pendingAmount = $this->getTotalAmount();

        foreach ($this->purchasePayments as $purchasePayment) {
            $pendingAmount -= $purchasePayment->amount;
        }

        return $pendingAmount;
    }

    /*
     * Get total amount raw.
     *
     */
    public function getTotalAmountRaw()
    {
        $total = 0;

        foreach ($this->purchaseItems as $purchaseItem) {
            $total += $purchaseItem->getTotalAmount();
        }

        return $total;
    }

    public function getVatAmount()
    {
        $total = 0;

        foreach ($this->purchaseAdditions as $purchaseAddition) {
            if (strtolower($purchaseAddition->purchaseAdditionHeading->name) == 'vat') {
                $total += $purchaseAddition->amount;
            }
        }

        return $total;
    }

    public function getSubTotal()
    {
        $total = 0;

        foreach ($this->purchaseItems as $purchaseItem) {
            $total += $purchaseItem->getTotalAmount();
        }

        return $total;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleQuotation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_quotation';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_quotation_id';

    protected $fillable = [
         'sale_quotation_date',
         'customer_id', 'creator_id',
         'total_amount', 'creation_status',
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
     * customer table.
     *
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'customer_id');
    }

    /*
     * sale_quotation_item table.
     *
     */
    public function saleQuotationItems()
    {
        return $this->hasMany('App\SaleQuotationItem', 'sale_quotation_id', 'sale_quotation_id');
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

        foreach ($this->saleQuotationItems as $saleQuotationItem) {
            $totalPrice = $saleQuotationItem->price_per_unit * $saleQuotationItem->quantity;
            $total += $totalPrice;
        }


        /*
        foreach ($this->saleInvoiceAdditions as $saleInvoiceAddition)  {
            if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'plus') {
                $total += $saleInvoiceAddition->amount;
            } else if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'minus') {
                $total -= $saleInvoiceAddition->amount;
            } else {
              // Todo
            }
        }
        */

        return $total;
    }

    public function getTotalAmountRaw()
    {
        $total = 0;

        foreach ($this->saleQuotationItems as $saleQuotationItem) {
            $totalPrice = $saleQuotationItem->price_per_unit * $saleQuotationItem->quantity;
            $total += $totalPrice;
        }

        return $total;
    }
}

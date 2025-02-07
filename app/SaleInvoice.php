<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleInvoice extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_invoice';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_invoice_id';

    protected $fillable = [
         'invoice_date', 'customer_id',
         'total_amount',
         'payment_status', 'creation_status',
         'creator_id',
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
     * sale_invoice_item table.
     *
     */
    public function saleInvoiceItems()
    {
        return $this->hasMany('App\SaleInvoiceItem', 'sale_invoice_id', 'sale_invoice_id');
    }

    /*
     * sale_invoice_payment table.
     *
     */
    public function saleInvoicePayments()
    {
        return $this->hasMany('App\SaleInvoicePayment', 'sale_invoice_id', 'sale_invoice_id');
    }

    /*
     * seat_table_booking table.
     *
     */
    public function seatTableBooking()
    {
        return $this->BelongsTo('App\SeatTableBooking', 'seat_table_booking_id', 'seat_table_booking_id');
    }

    /*
     * takeaway table.
     *
     */
    public function takeaway()
    {
        return $this->BelongsTo('App\Takeaway', 'takeaway_id', 'takeaway_id');
    }

    /*
     * sale_invoice_addition table.
     *
     */
    public function saleInvoiceAdditions()
    {
        return $this->hasMany('App\SaleInvoiceAddition', 'sale_invoice_id', 'sale_invoice_id');
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

        foreach ($this->saleInvoiceItems as $saleInvoiceItem) {
            //$totalPrice = $saleInvoiceItem->product->selling_price * $saleInvoiceItem->quantity;;
            $totalPrice = $saleInvoiceItem->price_per_unit * $saleInvoiceItem->quantity;
            $total += $totalPrice;
        }

        foreach ($this->saleInvoiceAdditions as $saleInvoiceAddition)  {
            if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'plus') {
                $total += $saleInvoiceAddition->amount;
            } else if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'minus') {
                $total -= $saleInvoiceAddition->amount;
            } else {
              // Todo
            }
        }

        return $total;
    }

    /*
     * Get grand total amount.
     *
     */
    public function getGrandTotalAmount()
    {
        $total = $this->getTotalAmount();

        return $total + $this->getSaleInvoiceAdditionsAmount();
    }

    /*
     * Get paid amount.
     *
     */
    public function getPaidAmount()
    {
        $total = 0;

        foreach ($this->saleInvoicePayments as $saleInvoicePayment) {
            $total += $saleInvoicePayment->amount;
        }

        return $total;
    }

    /*
     * Get pending amount.
     *
     */
    public function getPendingAmount()
    {
        $totalAmount = $this->getTotalAmount();
        $pendingAmount = $totalAmount;

        foreach ($this->saleInvoicePayments as $saleInvoicePayment) {
            $pendingAmount -= $saleInvoicePayment->amount;
        }

        return $pendingAmount;
    }

    public function getSaleInvoiceAdditionsAmount()
    {
        $total = 0;

        foreach ($this->saleInvoiceAdditions as $saleInvoiceAddition) {
            if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'plus') {
                $total += $saleInvoiceAddition->amount;
            } else if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'minus') {
                $total -= $saleInvoiceAddition->amount;
            } else {
                // Todo
            }
        }

        return $total;
    }

    public function getNonTaxSaleInvoiceAdditionsAmount()
    {
        $total = 0;

        foreach ($this->saleInvoiceAdditions as $saleInvoiceAddition) {
            if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat') {
                continue;
            }

            if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'plus') {
                $total += $saleInvoiceAddition->amount;
            } else if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'minus') {
                $total -= $saleInvoiceAddition->amount;
            } else {
                // Todo
            }
        }

        return $total;
    }

    public function getTotalAmountRaw()
    {
        $total = 0;

        foreach ($this->saleInvoiceItems as $saleInvoiceItem) {
            $totalPrice = $saleInvoiceItem->price_per_unit * $saleInvoiceItem->quantity;
            $total += $totalPrice;
        }

        return $total;
    }

    public function isPaid()
    {
        if (strtolower($this->payment_status) == 'paid') {
            return true;
        } else {
            return false;
        }
    }

    public function getTaxableAmount()
    {
        return $this->getTotalAmountRaw() + $this->getNonTaxSaleInvoiceAdditionsAmount();
    }

    public function getVatAmount()
    {
        $total = 0;

        foreach ($this->saleInvoiceAdditions as $saleInvoiceAddition) {
            if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat') {
                $total += $saleInvoiceAddition->amount;
            }
        }

        return $total;
    }
}

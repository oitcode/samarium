<?php

namespace App\Models\SeatTable;

use Illuminate\Database\Eloquent\Model;

class SeatTableBooking extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seat_table_booking';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'seat_table_booking_id';

    protected $fillable = [
         'seat_table_id', 'status',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * seat_table table.
     *
     */
    public function seatTable()
    {
        return $this->belongsTo('App\Models\SeatTable\SeatTable', 'seat_table_id', 'seat_table_id');
    }

    /*
     * seat_table_booking_item table.
     *
     */
    public function seatTableBookingItems()
    {
        return $this->hasMany('App\SeatTableBookingItem', 'seat_table_booking_id', 'seat_table_booking_id');
    }

    /*
     * sale_invoice table.
     *
     */
    public function saleInvoice()
    {
        return $this->hasOne('App\Models\SaleInvoice\SaleInvoice', 'seat_table_booking_id', 'seat_table_booking_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */
    public function getTotalItems()
    {
        if ($this->saleInvoice) {
            return count($this->saleInvoice->saleInvoiceItems);
        } else {
            return 0;
        }
    }

    public function getTotalAmount()
    {
        if ($this->saleInvoice) {
            return $this->saleInvoice->getTotalAmount();
        }
    }

    public function hasSaleInvoice()
    {
        if ($this->saleInvoice) {
            return true;
        } else {
            return false;
        }
    }
}

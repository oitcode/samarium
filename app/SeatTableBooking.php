<?php

namespace App;

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
        return $this->belongsTo('App\SeatTable', 'seat_table_id', 'seat_table_id');
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
        return $this->hasOne('App\SaleInvoice', 'seat_table_booking_id', 'seat_table_booking_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */
    public function getTotalItems()
    {
        return count($this->saleInvoice->saleInvoiceItems);
    }

    public function getTotalAmount()
    {
        $total = 0;

        foreach ($this->saleInvoice->saleInvoiceItems as $item) {
            $total +=  $item->getTotalAmount();
        }

        return $total;
    }
}

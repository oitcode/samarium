<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatTableBookingItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seat_table_booking_item';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'seat_table_booking_item_id';

    protected $fillable = [
         'seat_table_booking_id', 'product_id', 'quantity',
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
    public function seatTableBooking()
    {
        return $this->belongsTo('App\SeatTableBooking', 'seat_table_booking_id', 'seat_table_booking_id');
    }

    /*
     * product table.
     *
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    /*
     * get total amount.
     *
     */
    public function getTotalAmount()
    {
        $total = $this->product->selling_price * $this->quantity;

        return $total;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatTable extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seat_table';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'seat_table_id';

    protected $fillable = [
         'name',
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
    public function seatTableBookings()
    {
        return $this->hasMany('App\SeatTableBooking', 'seat_table_id', 'seat_table_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    /*
     * Is seat table booked?
     *
     */
    public function isBooked()
    {
        $booking = $this->seatTableBookings()->where('status', 'open')->first();

        if ($booking) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Get current booking
     *
     */
    public function getCurrentBooking()
    {
        $booking = $this->seatTableBookings()->where('status', 'open')->first();

        if ($booking) {
            return $booking;
        } else {
            return null;
        }
    }

    /*
     * Get current booking total items
     *
     */
    public function getCurrentBookingItems()
    {
        $booking = $this->getCurrentBooking();

        $items = $booking->saleInvoice->saleInvoiceItems;

        return $items;
    }

    /*
     * Get current booking total items
     *
     */
    public function getCurrentBookingTotalItems()
    {
        $booking = $this->getCurrentBooking();

        $totalItems = $booking->getTotalItems();

        return $totalItems;
    }

    /*
     * Get current booking total amount
     *
     */
    public function getCurrentBookingTotalAmount()
    {
        $total = 0;

        $booking = $this->getCurrentBooking();

        if ($booking) {
            foreach ($booking->saleInvoice->saleInvoiceItems as $item) {
                $total += $item->getTotalAmount();
            }
        }

        return $total;
    }


}

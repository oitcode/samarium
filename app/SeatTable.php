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

    /*
     * Get current booking Pending Amount
     *
     */
    public function getCurrentBookingPendingAmount()
    {
        $total = 0;

        $booking = $this->getCurrentBooking();

        return $booking->saleInvoice->getPendingAmount();

        // if ($booking) {
        //     foreach ($booking->saleInvoice->saleInvoiceItems as $item) {
        //         $total += $item->getTotalAmount();
        //     }
        // }

        // return $total;
    }

    public function getCurrentBookingGrandTotalAmount()
    {
        $booking = $this->getCurrentBooking();
        $saleInvoice = $booking->saleInvoice;

        $total = $this->getCurrentBookingTotalAmount();
        $grandTotal = $total;

        foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition) {
            if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'plus') {
                $grandTotal += $saleInvoiceAddition->amount;
            } else if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->effect) == 'minus') {
                $grandTotal -= $saleInvoiceAddition->amount;
            } else {
                dd('Sale Invoice Additions Heading COnfiguration gone wrong! Contact your service provider.');
            }
        }

        return $grandTotal;
    }
}

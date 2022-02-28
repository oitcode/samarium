<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SeatTableBooking;
use App\SaleInvoice;

class SeatTableWorkDisplay extends Component
{
    public $seatTable;

    public $modes = [
        'addItem' => true,
        'makePayment' => false,
    ];

    protected $listeners = [
        'exitAddItemMode',
        'exitMakePaymentMode',
        'itemAddedToBooking',
    ];

    public function render()
    {
        return view('livewire.seat-table-work-display');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function bookSeatTable()
    {
        /*
         * --------------------------------------------------------------------
         * CONCEPT
         * --------------------------------------------------------------------
         *
         * When you book a seat table you start a new sale_invoice.
         *
         */

        /* Create a seat table booking. */
        $seatTableBooking = new SeatTableBooking;

        $seatTableBooking->seat_table_id = $this->seatTable->seat_table_id;
        $seatTableBooking->booking_date = date('Y-m-d');
        $seatTableBooking->status = 'open';

        $seatTableBooking->save();


        /* Create a sale invoice */
        $saleInvoice = new SaleInvoice;

        $saleInvoice->sale_invoice_date = date('Y-m-d');
        $saleInvoice->seat_table_booking_id = $seatTableBooking->seat_table_booking_id;
        $saleInvoice->payment_status = 'pending';

        $saleInvoice->save();

        $this->render();
    }

    public function exitAddItemMode()
    {
        $this->exitMode('addItem');
    }

    public function exitMakePaymentMode()
    {
        $this->exitMode('makePayment');
    }

    public function itemAddedToBooking()
    {
        $this->render();
    }
}

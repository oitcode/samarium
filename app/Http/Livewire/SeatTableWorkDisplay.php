<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SeatTableBooking;

class SeatTableWorkDisplay extends Component
{
    public $seatTable;

    public $modes = [
        'addItem' => false,
        'makePayment' => false,
    ];

    protected $listeners = [
        'exitAddItemMode',
        'exitMakePaymentMode',
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
        $seatTableBooking = new SeatTableBooking;

        $seatTableBooking->seat_table_id = $this->seatTable->seat_table_id;
        $seatTableBooking->status = 'open';

        $seatTableBooking->save();
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
}

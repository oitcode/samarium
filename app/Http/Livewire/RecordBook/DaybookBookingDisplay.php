<?php

namespace App\Http\Livewire\RecordBook;

use Livewire\Component;

class DaybookBookingDisplay extends Component
{
    public $seatTableBooking;

    protected $listeners = [
        'displayingBookingChanged',
    ];

    public function render()
    {
        return view('livewire.record-book.daybook-booking-display');
    }

    public function displayingBookingChanged($seatTableBooking)
    {
        $this->seatTableBooking = $seatTableBooking;
    }
}

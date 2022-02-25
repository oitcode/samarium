<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DaybookBookingDisplay extends Component
{
    public $seatTableBooking;

    protected $listeners = [
        'displayingBookingChanged',
    ];

    public function render()
    {
        return view('livewire.daybook-booking-display');
    }

    public function displayingBookingChanged($seatTableBooking)
    {
        $this->seatTableBooking = $seatTableBooking;
    }
}

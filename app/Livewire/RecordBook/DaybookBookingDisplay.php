<?php

namespace App\Livewire\RecordBook;

use Livewire\Component;
use Illuminate\View\View;

class DaybookBookingDisplay extends Component
{
    public $seatTableBooking;

    protected $listeners = [
        'displayingBookingChanged',
    ];

    public function render(): View
    {
        return view('livewire.record-book.daybook-booking-display');
    }

    public function displayingBookingChanged($seatTableBooking): void
    {
        $this->seatTableBooking = $seatTableBooking;
    }
}

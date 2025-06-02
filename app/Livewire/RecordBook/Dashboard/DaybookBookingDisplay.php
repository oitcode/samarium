<?php

namespace App\Livewire\RecordBook\Dashboard;

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
        return view('livewire.record-book.dashboard.daybook-booking-display');
    }

    public function displayingBookingChanged($seatTableBooking): void
    {
        $this->seatTableBooking = $seatTableBooking;
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SeatTableBooking;

class FlashCardCurrentBookings extends Component
{
    public $currentBookingsCount;
    public $currentBookingsTotalAmount;

    public function render()
    {
        $this->currentBookingsCount = SeatTableBooking::where('status', 'open')->count();
        $this->calculateCurrentBookingsTotalAmount();

        return view('livewire.flash-card-current-bookings');
    }

    public function calculateCurrentBookingsTotalAmount()
    {
        $total = 0;

        foreach (SeatTableBooking::where('status', 'open')->get() as $seatTableBooking) {
            $total += $seatTableBooking->getTotalAmount();
        }

        $this->currentBookingsTotalAmount = $total;
    }
}

<?php

namespace App\Livewire\FlashCard;

use Livewire\Component;
use Illuminate\View\View;
use App\SeatTableBooking;

class FlashCardCurrentBookings extends Component
{
    public $currentBookingsCount;
    public $currentBookingsTotalAmount;

    public function render(): View
    {
        $this->currentBookingsCount = SeatTableBooking::where('status', 'open')->count();
        $this->calculateCurrentBookingsTotalAmount();

        return view('livewire.flash-card.flash-card-current-bookings');
    }

    public function calculateCurrentBookingsTotalAmount(): void
    {
        $total = 0;

        foreach (SeatTableBooking::where('status', 'open')->get() as $seatTableBooking) {
            $total += $seatTableBooking->getTotalAmount();
        }

        $this->currentBookingsTotalAmount = $total;
    }
}

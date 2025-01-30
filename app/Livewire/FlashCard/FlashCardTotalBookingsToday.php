<?php

namespace App\Livewire\FlashCard;

use Livewire\Component;
use App\SeatTableBooking;

class FlashCardTotalBookingsToday extends Component
{
    public $count;
    public $todayBookingsTotalAmount;

    public function render()
    {
        $this->count = SeatTableBooking::where('booking_date', date('Y-m-d'))->count();

        $this->calculateTodayBookingsTotalAmount();

        return view('livewire.flash-card.flash-card-total-bookings-today');
    }

    public function calculateTodayBookingsTotalAmount()
    {
        $total = 0;

        foreach (SeatTableBooking::where('booking_date', date('Y-m-d'))->get() as $seatTableBooking) {
            $total += $seatTableBooking->getTotalAmount();
        }

        $this->todayBookingsTotalAmount = $total;
    }
}

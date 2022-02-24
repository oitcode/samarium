<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SeatTableWorkDisplayMakePayment extends Component
{
    public $seatTable;

    public $total;
    public $pay_by;
    public $tender_amount;

    public $returnAmount;

    public $modes = [
        'paid' => false,
    ];

    public function mount()
    {
        $this->total = $this->seatTable->getCurrentBookingTotalAmount();
    }
    public function render()
    {
        return view('livewire.seat-table-work-display-make-payment');
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

    public function store()
    {
        $validatedData = $this->validate([
            'pay_by' => 'nullable',
            'tender_amount' => 'required|integer',
        ]);

        $currentBookingAmount = $this->seatTable->getCurrentBookingTotalAmount();

        if ($this->tender_amount < $currentBookingAmount) {
            return;
        }

        /* Todo: Make payment against an invoice */

        $this->returnAmount = $this->tender_amount - $currentBookingAmount;

        $this->enterMode('paid');

    }

    public function finishPayment()
    {
        $booking = $this->seatTable->getCurrentBooking();
        $booking->status = 'closed';
        $booking->save();

        $this->emit('exitMakePaymentMode');
    }
}

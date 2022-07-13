<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Purchase;

class FlashCardTotalPurchaseToday extends Component
{
    public $count;
    public $todayPurchaseTotalAmount;

    public function render()
    {
        $this->count = Purchase::whereDate('created_at', date('Y-m-d'))->count();

        $this->calculateTodayPurchaseTotalAmount();

        return view('livewire.flash-card-total-purchase-today');
    }

    public function calculateTodayPurchaseTotalAmount()
    {
        $total = 0;

        foreach (Purchase::whereDate('created_at', date('Y-m-d'))->get() as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        $this->todayPurchaseTotalAmount = $total;
    }
}

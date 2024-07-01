<?php

namespace App\Http\Livewire\FlashCard;

use Livewire\Component;
use App\Takeaway;

class FlashCardTotalTakeawaysToday extends Component
{
    public $count;
    public $todayTakeawaysTotalAmount;

    public function render()
    {
        $this->count = Takeaway::whereDate('created_at', date('Y-m-d'))->count();

        $this->calculateTodayTakeawaysTotalAmount();

        return view('livewire.flash-card.flash-card-total-takeaways-today');
    }

    public function calculateTodayTakeawaysTotalAmount()
    {
        $total = 0;

        foreach (Takeaway::whereDate('created_at', date('Y-m-d'))->get() as $takeaway) {
            $total += $takeaway->getTotalAmount();
        }

        $this->todayTakeawaysTotalAmount = $total;
    }
}

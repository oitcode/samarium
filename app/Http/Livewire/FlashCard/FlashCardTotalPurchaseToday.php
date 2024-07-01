<?php

namespace App\Http\Livewire\FlashCard;

use Livewire\Component;

use App\Purchase;

class FlashCardTotalPurchaseToday extends Component
{
    public $count;
    public $todayPurchaseTotalAmount;

    public $transactionsDate = null;

    protected $listeners = [
        'changeDate',
    ];

    public function mount()
    {
        if ($this->transactionsDate == null) {
            $this->transactionsDate = date('Y-m-d');
        }
    }

    public function render()
    {
        $this->count = Purchase::whereDate('purchase_date', $this->transactionsDate)->count();

        $this->calculateTodayPurchaseTotalAmount();

        return view('livewire.flash-card.flash-card-total-purchase-today');
    }

    public function calculateTodayPurchaseTotalAmount()
    {
        $total = 0;

        foreach (Purchase::whereDate('purchase_date', $this->transactionsDate)->get() as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        $this->todayPurchaseTotalAmount = $total;
    }

    public function changeDate($transactionsDate)
    {
        $this->transactionsDate = $transactionsDate;
        $this->render();
    }
}

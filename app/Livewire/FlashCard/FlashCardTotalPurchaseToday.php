<?php

namespace App\Livewire\FlashCard;

use Livewire\Component;
use Illuminate\View\View;
use App\Purchase;

class FlashCardTotalPurchaseToday extends Component
{
    public $count;
    public $todayPurchaseTotalAmount;

    public $transactionsDate = null;

    protected $listeners = [
        'changeDate',
    ];

    public function mount(): void
    {
        if ($this->transactionsDate == null) {
            $this->transactionsDate = date('Y-m-d');
        }
    }

    public function render(): View
    {
        $this->count = Purchase::whereDate('purchase_date', $this->transactionsDate)->count();

        $this->calculateTodayPurchaseTotalAmount();

        return view('livewire.flash-card.flash-card-total-purchase-today');
    }

    public function calculateTodayPurchaseTotalAmount(): void
    {
        $total = 0;

        foreach (Purchase::whereDate('purchase_date', $this->transactionsDate)->get() as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        $this->todayPurchaseTotalAmount = $total;
    }

    public function changeDate($transactionsDate): void
    {
        $this->transactionsDate = $transactionsDate;
        $this->render();
    }
}

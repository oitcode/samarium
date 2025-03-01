<?php

namespace App\Livewire\FlashCard;

use Livewire\Component;
use Illuminate\View\View;
use App\Expense;

class FlashCardTotalExpenseToday extends Component
{
    public $count;
    public $todayExpenseTotalAmount;

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
        $this->count = Expense::whereDate('date', $this->transactionsDate)->count();

        $this->calculateTodayExpenseTotalAmount();

        return view('livewire.flash-card.flash-card-total-expense-today');
    }

    public function calculateTodayExpenseTotalAmount(): void
    {
        $total = 0;

        foreach (Expense::whereDate('date', $this->transactionsDate)->get() as $expense) {
            $total += $expense->getTotalAmount();
        }

        $this->todayExpenseTotalAmount = $total;
    }

    public function changeDate($transactionsDate): void
    {
        $this->transactionsDate = $transactionsDate;
        $this->render();
    }
}

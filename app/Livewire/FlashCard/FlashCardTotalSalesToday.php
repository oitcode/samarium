<?php

namespace App\Livewire\FlashCard;

use Livewire\Component;
use Illuminate\View\View;
use App\SaleInvoice;

class FlashCardTotalSalesToday extends Component
{
    public $count;
    public $todaySalesTotalAmount;

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
        $this->count = SaleInvoice::where('sale_invoice_date', $this->transactionsDate)->count();

        $this->calculateTodaySalesTotalAmount();

        return view('livewire.flash-card.flash-card-total-sales-today');
    }

    public function calculateTodaySalesTotalAmount(): void
    {
        $total = 0;

        foreach (SaleInvoice::where('sale_invoice_date', $this->transactionsDate)->get() as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        $this->todaySalesTotalAmount = $total;
    }

    public function changeDate($transactionsDate): void
    {
        $this->transactionsDate = $transactionsDate;
        $this->render();
    }
}

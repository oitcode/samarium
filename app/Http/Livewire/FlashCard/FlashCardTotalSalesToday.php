<?php

namespace App\Http\Livewire;

use Livewire\Component\FlashCard;

use App\SaleInvoice;

class FlashCardTotalSalesToday extends Component
{
    public $count;
    public $todaySalesTotalAmount;

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
        $this->count = SaleInvoice::where('sale_invoice_date', $this->transactionsDate)->count();

        $this->calculateTodaySalesTotalAmount();

        return view('livewire.flash-card.flash-card-total-sales-today');
    }

    public function calculateTodaySalesTotalAmount()
    {
        $total = 0;

        foreach (SaleInvoice::where('sale_invoice_date', $this->transactionsDate)->get() as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        $this->todaySalesTotalAmount = $total;
    }

    public function changeDate($transactionsDate)
    {
        $this->transactionsDate = $transactionsDate;
        $this->render();
    }
}

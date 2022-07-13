<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SaleInvoice;

class FlashCardTotalSalesToday extends Component
{
    public $count;
    public $todaySalesTotalAmount;

    public function render()
    {
        $this->count = SaleInvoice::where('sale_invoice_date', date('Y-m-d'))->count();

        $this->calculateTodaySalesTotalAmount();

        return view('livewire.flash-card-total-sales-today');
    }

    public function calculateTodaySalesTotalAmount()
    {
        $total = 0;

        foreach (SaleInvoice::where('sale_invoice_date', date('Y-m-d'))->get() as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        $this->todaySalesTotalAmount = $total;
    }
}

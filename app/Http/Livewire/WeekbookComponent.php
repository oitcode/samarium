<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use App\SaleInvoice;

class WeekbookComponent extends Component
{
    public $startDay;
    public $weekStartDate;

    public $weekBook = array();
    public $totalAmount = array();

    public function mount()
    {
        $this->startDay = Carbon::now()->startOfWeek(Carbon::SUNDAY);
    }

    public function render()
    {
        $this->populateWeekBook();
        $this->totalAmount = $this->getTotalAmount();

        return view('livewire.weekbook-component');
    }

    public function goToPreviousWeek()
    {
        $this->startDay->subWeek();
    }

    public function goToNextWeek()
    {
        $this->startDay->addWeek();
    }

    public function populateWeekBook()
    {
        $this->weekBook = array();

        $day = $this->startDay->copy();

        for ($i = 0; $i < 7; $i++) {
            $this->weekBook[] = [
                'day' => $day->copy(),
                'totalBills' => $this->getTotalBillsOfDay($day),
                'totalAmount' => $this->getTotalAmountOfDay($day),
            ];

            $day = $day->addDay();
        }

        // dd($this->weekBook);
    }

    public function getTotalAmountOfDay($day)
    {
        $saleInvoices = SaleInvoice::where('sale_invoice_date', $day->format('Y-m-d'))->get();

        $total = 0;

        foreach ($saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function getTotalBillsOfDay($day)
    {
        return count(SaleInvoice::where('sale_invoice_date', $day->format('Y-m-d'))->get());
    }

    public function getTotalAmount()
    {
        $total = 0;

        $day = $this->startDay->copy();

        for ($i = 0; $i < 7; $i++) {

            $total += $this->getTotalAmountOfDay($day);
            $day = $day->addDay();
        }

        return $total;
    }

    public function setStartOfWeek()
    {
        $validatedData = $this->validate([
            'weekStartDate' => 'required|date',
        ]);

        $this->startDay = Carbon::parse($validatedData['weekStartDate']);
    }
}

<?php

namespace App\Livewire\RecordBook\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;
use App\SaleInvoice;
use App\Purchase;
use App\Expense;

class WeekbookComponent extends Component
{
    public $startDay;
    public $weekStartDate;

    public $weekBook = array();
    public $totalAmount = array();

    public $weekBookPurchase = array();
    public $totalAmountPurchase = array();

    public $weekBookExpense = array();
    public $totalAmountExpense = array();

    public function mount(): void
    {
        $this->startDay = Carbon::now()->startOfWeek(Carbon::SUNDAY);
    }

    public function render(): View
    {
        $this->populateWeekBook();
        $this->totalAmount = $this->getTotalAmount();

        $this->populateWeekBookPurchase();
        $this->totalAmountPurchase = $this->getTotalAmountPurchase();

        $this->populateWeekBookExpense();
        $this->totalAmountExpense = $this->getTotalAmountExpense();

        return view('livewire.record-book.dashboard.weekbook-component');
    }

    public function goToPreviousWeek(): void
    {
        $this->startDay->subWeek();
    }

    public function goToNextWeek(): void
    {
        $this->startDay->addWeek();
    }

    public function populateWeekBook(): void
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
    }

    public function populateWeekBookPurchase(): void
    {
        $this->weekBookPurchase = array();

        $day = $this->startDay->copy();

        for ($i = 0; $i < 7; $i++) {
            $this->weekBookPurchase[] = [
                'day' => $day->copy(),
                'totalBills' => $this->getTotalPurchaseBillsOfDay($day),
                'totalAmount' => $this->getTotalPurchaseAmountOfDay($day),
            ];

            $day = $day->addDay();
        }
    }

    public function populateWeekBookExpense(): void
    {
        $this->weekBookExpense = array();

        $day = $this->startDay->copy();

        for ($i = 0; $i < 7; $i++) {
            $this->weekBookExpense[] = [
                'day' => $day->copy(),
                'totalBills' => $this->getTotalExpenseBillsOfDay($day),
                'totalAmount' => $this->getTotalExpenseAmountOfDay($day),
            ];

            $day = $day->addDay();
        }
    }

    public function getTotalAmountOfDay($day): int|float
    {
        $saleInvoices = SaleInvoice::where('sale_invoice_date', $day->format('Y-m-d'))->get();

        $total = 0;

        foreach ($saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function getTotalBillsOfDay($day): int
    {
        return count(SaleInvoice::where('sale_invoice_date', $day->format('Y-m-d'))->get());
    }

    public function getTotalPurchaseAmountOfDay($day): int|float
    {
        $purchases = Purchase::where('purchase_date', $day->format('Y-m-d'))->get();

        $total = 0;

        foreach ($purchases as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        return $total;
    }

    public function getTotalPurchaseBillsOfDay($day): int
    {
        return count(Purchase::where('purchase_date', $day->format('Y-m-d'))->get());
    }

    public function getTotalExpenseAmountOfDay($day): int|float
    {
        $expenses = Expense::where('date', $day->format('Y-m-d'))->get();

        $total = 0;

        foreach ($expenses as $expense) {
            $total += $expense->getTotalAmount();
        }

        return $total;
    }

    public function getTotalExpenseBillsOfDay($day): int
    {
        return count(Expense::where('date', $day->format('Y-m-d'))->get());
    }

    public function getTotalAmount(): int|float
    {
        $total = 0;

        $day = $this->startDay->copy();

        for ($i = 0; $i < 7; $i++) {

            $total += $this->getTotalAmountOfDay($day);
            $day = $day->addDay();
        }

        return $total;
    }

    public function getTotalAmountPurchase(): int|float
    {
        $total = 0;

        $day = $this->startDay->copy();

        for ($i = 0; $i < 7; $i++) {

            $total += $this->getTotalPurchaseAmountOfDay($day);
            $day = $day->addDay();
        }

        return $total;
    }

    public function getTotalAmountExpense(): int|float
    {
        $total = 0;

        $day = $this->startDay->copy();

        for ($i = 0; $i < 7; $i++) {

            $total += $this->getTotalExpenseAmountOfDay($day);
            $day = $day->addDay();
        }

        return $total;
    }

    public function setStartOfWeek(): void
    {
        $validatedData = $this->validate([
            'weekStartDate' => 'required|date',
        ]);

        $this->startDay = Carbon::parse($validatedData['weekStartDate']);
    }
}

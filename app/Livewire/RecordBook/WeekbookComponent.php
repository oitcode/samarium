<?php

namespace App\Livewire\RecordBook;

use Livewire\Component;
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

    public function mount()
    {
        $this->startDay = Carbon::now()->startOfWeek(Carbon::SUNDAY);
    }

    public function render()
    {
        $this->populateWeekBook();
        $this->totalAmount = $this->getTotalAmount();

        $this->populateWeekBookPurchase();
        $this->totalAmountPurchase = $this->getTotalAmountPurchase();

        $this->populateWeekBookExpense();
        $this->totalAmountExpense = $this->getTotalAmountExpense();

        return view('livewire.record-book.weekbook-component');
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
    }

    public function populateWeekBookPurchase()
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

    public function populateWeekBookExpense()
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

    public function getTotalPurchaseAmountOfDay($day)
    {
        $purchases = Purchase::where('purchase_date', $day->format('Y-m-d'))->get();

        $total = 0;

        foreach ($purchases as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        return $total;
    }

    public function getTotalPurchaseBillsOfDay($day)
    {
        return count(Purchase::where('purchase_date', $day->format('Y-m-d'))->get());
    }

    public function getTotalExpenseAmountOfDay($day)
    {
        $expenses = Expense::where('date', $day->format('Y-m-d'))->get();

        $total = 0;

        foreach ($expenses as $expense) {
            $total += $expense->getTotalAmount();
        }

        return $total;
    }

    public function getTotalExpenseBillsOfDay($day)
    {
        return count(Expense::where('date', $day->format('Y-m-d'))->get());
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

    public function getTotalAmountPurchase()
    {
        $total = 0;

        $day = $this->startDay->copy();

        for ($i = 0; $i < 7; $i++) {

            $total += $this->getTotalPurchaseAmountOfDay($day);
            $day = $day->addDay();
        }

        return $total;
    }

    public function getTotalAmountExpense()
    {
        $total = 0;

        $day = $this->startDay->copy();

        for ($i = 0; $i < 7; $i++) {

            $total += $this->getTotalExpenseAmountOfDay($day);
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

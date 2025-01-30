<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\SaleInvoice;
use App\Purchase;
use App\Expense;

class ReportTransactionComponent extends Component
{
    public $startDate = null;
    public $endDate = null;

    public $saleInvoices = null;
    public $purchases = null;
    public $expenses = null;

    public $saleInvoiceTotal = 0;
    public $purchaseTotal = 0;
    public $expenseTotal = 0;
    public $netTotal = 0;

    public function mount()
    {
        $this->startDate = date('Y-m-d');
        $this->endDate = date('Y-m-d');
    }

    public function render()
    {
        $this->getSaleInvoicesForDateRange();
        $this->getPurchasesForDateRange();
        $this->getExpensesForDateRange();

        $this->calculateSaleInvoiceTotal();
        $this->calculatePurchaseTotal();
        $this->calculateExpenseTotal();
        $this->calculateNetTotal();

        return view('livewire.report.report-transaction-component');
    }

    public function calculateSaleInvoiceTotal()
    {
        $total = 0;

        foreach ($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        $this->saleInvoiceTotal = $total;
    }

    public function calculatePurchaseTotal()
    {
        $total = 0;

        foreach ($this->purchases as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        $this->purchaseTotal = $total;
    }

    public function calculateExpenseTotal()
    {
        $total = 0;

        foreach ($this->expenses as $expense) {
            $total += $expense->getTotalAmount();
        }

        $this->expenseTotal = $total;
    }

    public function getPurchasesForDateRange()
    {
        /* Todo: Validation */
        $validatedData = $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'nullable|date',
        ]);

        /*
         * Todo: Validate that endDate is not smaller than startDate
         *
         * Well, below is a simple validation.
         *
         * TOdo: Need to do in livewire / laravel specific way.
         *
         */

        if ($validatedData['endDate']) {
            if (! $validatedData['startDate']) {
                return;
            }

            if ($validatedData['startDate'] > $validatedData['endDate']) {
                return;
            }
        }

        if ($validatedData['endDate']) {
            $purchases = Purchase::whereDate('created_at', '>=', $validatedData['startDate'])
                ->whereDate('created_at', '<=', $validatedData['endDate'])
                ->orderBy('purchase_id', 'desc')
                ->get();
        } else {
            $purchases = Purchase::whereDate('created_at', $validatedData['startDate'])
                ->orderBy('purchase_id', 'desc')
                ->get();
        }

        $this->purchases = $purchases;
    }

    public function getSaleInvoicesForDateRange()
    {
        /* Todo: Validation */
        $validatedData = $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'nullable|date',
        ]);

        /*
         * Todo: Validate that endDate is not smaller than startDate
         *
         * Well, below is a simple validation.
         *
         * TOdo: Need to do in livewire / laravel specific way.
         *
         */

        if ($validatedData['endDate']) {
            if (! $validatedData['startDate']) {
                return;
            }

            if ($validatedData['startDate'] > $validatedData['endDate']) {
                return;
            }
        }

        if ($validatedData['endDate']) {
            $saleInvoices = SaleInvoice::whereDate('created_at', '>=', $validatedData['startDate'])
                ->whereDate('created_at', '<=', $validatedData['endDate'])
                ->orderBy('sale_invoice_id', 'desc')
                ->get();
        } else {
            $saleInvoices = SaleInvoice::whereDate('created_at', $validatedData['startDate'])
                ->orderBy('sale_invoice_id', 'desc')
                ->get();
        }

        $this->saleInvoices = $saleInvoices;
    }

    public function getExpensesForDateRange()
    {
        /* Todo: Validation */
        $validatedData = $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'nullable|date',
        ]);

        /*
         * Todo: Validate that endDate is not smaller than startDate
         *
         * Well, below is a simple validation.
         *
         * TOdo: Need to do in livewire / laravel specific way.
         *
         */

        if ($validatedData['endDate']) {
            if (! $validatedData['startDate']) {
                return;
            }

            if ($validatedData['startDate'] > $validatedData['endDate']) {
                return;
            }
        }

        if ($validatedData['endDate']) {
            $expenses = Expense::whereDate('date', '>=', $validatedData['startDate'])
                ->whereDate('date', '<=', $validatedData['endDate'])
                ->orderBy('expense_id', 'desc')
                ->get();
        } else {
            $expenses = Expense::whereDate('date', $validatedData['startDate'])
                ->orderBy('expense_id', 'desc')
                ->get();
        }

        $this->expenses = $expenses;
    }

    public function calculateNetTotal()
    {
        $this->netTotal = $this->saleInvoiceTotal - ($this->purchaseTotal + $this->expenseTotal);
    }
}

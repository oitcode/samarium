<?php

namespace App\Livewire\Misc;

use Livewire\Component;
use Illuminate\View\View;
use App\SaleInvoice;
use App\Purchase;
use App\Expense;

class VatReturn extends Component
{
    public $startDate = null;
    public $endDate = null;

    public $saleInvoices = null;
    public $purchases = null;
    public $expenses = null;

    public $saleInvoiceTotal = 0;
    public $purchaseTotal = 0;
    public $expenseTotal = 0;

    public $salesVat = 0;
    public $purchaseVat = 0;
    public $expenseVat = 0;

    public $vatBalance = 0;

    public function mount(): void
    {
        $this->startDate = date('Y-m-d');
        $this->endDate = date('Y-m-d');
    }

    public function render(): View
    {
        $this->getSaleInvoicesForDateRange();
        $this->getPurchasesForDateRange();
        $this->getExpensesForDateRange();

        $this->calculateSaleInvoiceTotal();
        $this->calculatePurchaseTotal();
        $this->calculateExpenseTotal();
        //$this->calculateNetTotal();

        $this->salesVat = $this->calculateSalesVat();
        $this->purchaseVat = $this->calculatePurchaseVat();
        $this->expenseVat = $this->calculateExpenseVat();

        return view('livewire.misc.vat-return');
    }

    public function getPurchasesForDateRange(): void
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

    public function getSaleInvoicesForDateRange(): void
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

    public function getExpensesForDateRange(): void
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
            $expenses = Expense::whereDate('created_at', '>=', $validatedData['startDate'])
                ->whereDate('created_at', '<=', $validatedData['endDate'])
                ->orderBy('expense_id', 'desc')
                ->get();
        } else {
            $expenses = Expense::whereDate('created_at', $validatedData['startDate'])
                ->orderBy('expense_id', 'desc')
                ->get();
        }

        $this->expenses = $expenses;
    }

    public function calculateSaleInvoiceTotal(): void
    {
        $total = 0;

        foreach ($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        $this->saleInvoiceTotal = $total;
    }

    public function calculatePurchaseTotal(): void
    {
        $total = 0;

        foreach ($this->purchases as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        $this->purchaseTotal = $total;
    }

    public function calculateExpenseTotal(): void
    {
        $total = 0;

        foreach ($this->expenses as $expense) {
            $total += $expense->getTotalAmount();
        }

        $this->expenseTotal = $total;
    }

    public function calculateSalesVat(): int|float
    {
        $total = 0;

        foreach ($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getVatAmount();
        }

        return $total;
    }

    public function calculatePurchaseVat(): int|float
    {
        $total = 0;

        foreach ($this->purchases as $purchase) {
            $total += $purchase->getVatAmount();
        }

        return $total;
    }

    public function calculateExpenseVat(): int|float
    {
        $total = 0;

        foreach ($this->expenses as $expense) {
            $total += $expense->getVatAmount();
        }

        return $total;
    }
}

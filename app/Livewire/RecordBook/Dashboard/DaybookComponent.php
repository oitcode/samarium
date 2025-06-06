<?php

namespace App\Livewire\RecordBook\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use Carbon\Carbon;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\SaleInvoice\SaleInvoice;
use App\Models\SaleInvoice\SaleInvoiceItem;
use App\Models\SaleInvoice\SeatTableBooking;
use App\Models\SaleInvoice\SaleInvoicePaymentType;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\PurchaseItem;
use App\Models\Purchase\PurchasePaymentType;
use App\Models\Expense\Expense;
use App\Models\Expense\ExpenseItem;
use App\Models\Expense\ExpensePaymentType;

class DaybookComponent extends Component
{
    use ModesTrait;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $daybookDate;
    //public $saleInvoices;

    public $totalAmount;
    public $totalCashAmount;
    public $totalCreditAmount;
    public $totalSaleAmount;

    /* Purchase realted. */
    public $totalPurchaseAmount;
    public $todayPurchaseCount;
    public $todayPurchaseItems = array();
    public $purchasePaymentByType = array();
    public $netPurchasePendingAmount;

    /* Expense realted. */
    public $totalExpenseAmount;
    public $todayExpenseCount;
    public $todayExpenseItems = array();
    public $expensePaymentByType = array();
    public $netExpensePendingAmount;

    public $seatTableBookings;
    public $totalBookingAmount;

    public $displayingSaleInvoice;

    public $paymentByType = array();

    public $todayItems = array();
    public $weekBook = array();

    public $netPendingAmount;

    public $todaySaleInvoiceCount;

    public $modes = [
        'displaySaleInvoice' => false,
    ];

    protected $listeners = [
        'exitDisplaySaleInvoiceMode',
    ];

    public function mount(): void
    {
        $this->daybookDate = date('Y-m-d');
    }

    public function render(): View
    {
        /*
         *
         * Do sale_invoice related work.
         *
         */
        $saleInvoices = SaleInvoice::where('sale_invoice_date', $this->daybookDate)->orderBy('sale_invoice_id', 'desc')->paginate(100);

        $this->todaySaleInvoiceCount = SaleInvoice::where('sale_invoice_date', $this->daybookDate)->count();

        $this->totalAmount = $this->getTotalAmount($saleInvoices);
        // $this->totalCashAmount = $this->getTotalCashAmount();
        // $this->totalCreditAmount = $this->getTotalCreditAmount();
        $this->totalSaleAmount = $this->getTotalSaleAmount($saleInvoices);

        $this->paymentByType = array();
        foreach (SaleInvoicePaymentType::all() as $saleInvoicePaymentType) {
            $this->paymentByType += array(
                $saleInvoicePaymentType->name
                =>
                $this->getPaymentTotalByType($saleInvoices, $saleInvoicePaymentType->sale_invoice_payment_type_id)
            );
        }

        $this->calculateNetPendingAmount($saleInvoices);

        $this->getSaleItemQuantity($saleInvoices);


        /*
         *
         * Do purchase related work.
         *
         */

        $purchases = Purchase::where('purchase_date', $this->daybookDate)->orderBy('purchase_id', 'desc')->paginate(100);
        $this->todayPurchaseCount = Purchase::where('purchase_date', $this->daybookDate)->count();
        $this->totalPurchaseAmount = $this->getTotalPurchaseAmount($purchases);

        $this->purchasePaymentByType = array();
        foreach (PurchasePaymentType::all() as $purchasePaymentType) {
            $this->purchasePaymentByType += array(
                $purchasePaymentType->name
                =>
                $this->getPurchasePaymentTotalByType($purchases, $purchasePaymentType->purchase_payment_type_id)
            );
        }

        $this->calculateNetPurchasePendingAmount($purchases);
        $this->getPurchaseItemQuantity($purchases);
        

        /*
         *
         * Do expense related work.
         *
         */

        $expenses = Expense::where('date', $this->daybookDate)->orderBy('expense_id', 'desc')->paginate(100);
        $this->todayExpenseCount = Expense::where('date', $this->daybookDate)->count();
        $this->totalExpenseAmount = $this->getTotalExpenseAmount($expenses);

        $this->expensePaymentByType = array();
        foreach (ExpensePaymentType::all() as $expensePaymentType) {
            $this->expensePaymentByType += array(
                $expensePaymentType->name
                =>
                $this->getExpensePaymentTotalByType($expenses, $expensePaymentType->expense_payment_type_id)
            );
        }


        /*
         *
         * Return the view with required info.
         *
         */
        return view('livewire.record-book.dashboard.daybook-component')
            ->with('saleInvoices', $saleInvoices)
            ->with('purchases', $purchases)
            ->with('expenses', $expenses);
    }

    public function setPreviousDay(): void
    {
        $this->clearModes();
        $this->daybookDate = Carbon::create($this->daybookDate)->subDay()->toDateString();
    }

    public function setNextDay(): void
    {
        $this->clearModes();
        $this->daybookDate = Carbon::create($this->daybookDate)->addDay()->toDateString();
    }

    public function getTotalAmount($saleInvoices): int|float
    {
        $total = 0;

        foreach($saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function getTotalCashAmount(): int|float
    {
        $total = 0;

        foreach($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getPaidAmount();
        }

        return $total;
    }

    public function getTotalCreditAmount(): int|float
    {
        $total = 0;

        foreach($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getPendingAmount();
        }

        return $total;
    }

    public function getTotalBookingAmount(): int|float
    {
        $total = 0;

        foreach($this->seatTableBookings as $booking) {
            $total += $booking->getTotalAmount();
        }

        return $total;
    }

    public function displaySaleInvoice(SaleInvoice $saleInoice): void
    {
        $this->displayingSaleInvoice = $saleInoice;
        if ($this->modes['displaySaleInvoice']) {
            $this->exitMode('displayBooking');
        } else {
            $this->enterMode('displaySaleInvoice');
        }
    }

    public function getTotalSaleAmount($saleInvoices): int|float
    {
        $total = 0;

        foreach ($saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function getTotalPurchaseAmount($purchases): int|float
    {
        $total = 0;

        foreach ($purchases as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        return $total;
    }

    public function getTotalExpenseAmount($expenses): int|float
    {
        $total = 0;

        foreach ($expenses as $expense) {
            $total += $expense->getTotalAmount();
        }

        return $total;
    }

    public function exitDisplaySaleInvoiceMode(): void
    {
        $this->displayingSaleInvoice = null;
        $this->exitMode('displaySaleInvoice');
    }

    public function getPaymentTotalByType($saleInvoices, $paymentTypeId): int|float
    {
        $paymentType = SaleInvoicePaymentType::find($paymentTypeId);

        $total = 0;

        foreach ($saleInvoices as $saleInvoice) {
            foreach ($saleInvoice->saleInvoicePayments as $saleInvoicePayment) {
                if ($saleInvoicePayment->sale_invoice_payment_type_id == $paymentTypeId) {
                    $total += $saleInvoicePayment->amount;
                }
            }
        }

        return $total;
    }

    public function getPurchasePaymentTotalByType($purchases, $purchasePaymentTypeId): int|float
    {
        $purchasePaymentType = PurchasePaymentType::find($purchasePaymentTypeId);

        $total = 0;

        foreach ($purchases as $purchase) {
            foreach ($purchase->purchasePayments as $purchasePayment) {
                if ($purchasePayment->purchase_payment_type_id == $purchasePaymentTypeId) {
                    $total += $purchasePayment->amount;
                }
            }
        }

        return $total;
    }

    public function getExpensePaymentTotalByType($expenses, $expensePaymentTypeId): int|float
    {
        $expensePaymentType = ExpensePaymentType::find($expensePaymentTypeId);

        $total = 0;

        foreach ($expenses as $expense) {
            foreach ($expense->expensePayments as $expensePayment) {
                if ($expensePayment->expense_payment_type_id == $expensePaymentTypeId) {
                    $total += $expensePayment->amount;
                }
            }
        }

        return $total;
    }

    public function cmpTodayItems($a, $b): int
    {
        if ($a['quantity'] < $b['quantity']) {
            return -1;
        } else if ($a['quantity'] == $b['quantity']) {
            return 0;
        } else {
            return 1;
        }
    }

    public function getSaleItemQuantity($saleInvoices): void
    {
        $this->todayItems = array();

        foreach ($saleInvoices as $saleInvoice) {
            foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
                if ($this->itemInTodayItems($saleInvoiceItem->product)) {
                    $this->updateTodayItemsCount($saleInvoiceItem);
                } else {
                    $this->addToTodayItemsCount($saleInvoiceItem);
                }
            }
        }

        usort($this->todayItems, function ($a, $b) {
            if ($b['quantity'] < $a['quantity']) {
                return -1;
            } else if ($b['quantity'] == $a['quantity']) {
                return 0;
            } else {
                return 1;
            }
        });
    }

    public function getPurchaseItemQuantity($purchases): void
    {
        $this->todayPurchaseItems = array();

        foreach ($purchases as $purchase) {
            foreach ($purchase->purchaseItems as $purchaseItem) {
                if ($this->itemInTodayPurchaseItems($purchaseItem->product)) {
                    $this->updateTodayPurchaseItemsCount($purchaseItem);
                } else {
                    $this->addToTodayPurchaseItemsCount($purchaseItem);
                }
            }
        }

        usort($this->todayPurchaseItems, function ($a, $b) {
            if ($b['quantity'] < $a['quantity']) {
                return -1;
            } else if ($b['quantity'] == $a['quantity']) {
                return 0;
            } else {
                return 1;
            }
        });
    }

    public function itemInTodayItems(Product $product): bool
    {
        foreach ($this->todayItems as $item) {
            if ($item['product']->product_id == $product->product_id) {
                return true;
            }
        }

        return false;
    }

    public function itemInTodayPurchaseItems(Product $product): bool
    {
        foreach ($this->todayPurchaseItems as $item) {
            if ($item['product']->product_id == $product->product_id) {
                return true;
            }
        }

        return false;
    }

    public function updateTodayItemsCount(SaleInvoiceItem $saleInvoiceItem): void
    {
        for ($i=0; $i < count($this->todayItems); $i++) {
            if ($this->todayItems[$i]['product']->product_id == $saleInvoiceItem->product->product_id) {
                $this->todayItems[$i]['quantity'] += $saleInvoiceItem->quantity;
                break;
            }
        }
    }

    public function updateTodayPurchaseItemsCount(PurchaseItem $purchaseItem): void
    {
        for ($i=0; $i < count($this->todayPurchaseItems); $i++) {
            if ($this->todayPurchaseItems[$i]['product']->product_id == $purchaseItem->product->product_id) {
                $this->todayPurchaseItems[$i]['quantity'] += $purchaseItem->quantity;
                break;
            }
        }
    }

    public function updateTodayExpenseItemsCount(PurchaseItem $expenseItem): void
    {
        for ($i=0; $i < count($this->todayExpenseItems); $i++) {
            if ($this->todayExpenseItems[$i]['product']->product_id == $expenseItem->product->product_id) {
                $this->todayExpenseItems[$i]['quantity'] += $expenseItem->quantity;
                break;
            }
        }
    }

    public function addToTodayItemsCount(SaleInvoiceItem $saleInvoiceItem): void
    {
        $line = array();

        $line['product'] = $saleInvoiceItem->product;
        $line['quantity'] = $saleInvoiceItem->quantity;

        $this->todayItems[] = $line;
    }

    public function addToTodayPurchaseItemsCount(PurchaseItem $purchaseItem): void
    {
        $line = array();

        $line['product'] = $purchaseItem->product;
        $line['quantity'] = $purchaseItem->quantity;

        $this->todayPurchaseItems[] = $line;
    }

    public function addToTodayExpenseItemsCount(ExpenseItem $expenseItem): void
    {
        $line = array();

        $line['product'] = $expenseItem->product;
        $line['quantity'] = $expenseItem->quantity;

        $this->todayExpenseItems[] = $line;
    }

    public function calculateNetPendingAmount($saleInvoices): void
    {
        $pendingAmount = 0;

        foreach ($saleInvoices as $saleInvoice) {
            $pendingAmount += $saleInvoice->getPendingAmount();
        }

        $this->netPendingAmount = $pendingAmount;
    }

    public function calculateNetPurchasePendingAmount($purchases): void
    {
        $pendingAmount = 0;

        foreach ($purchases as $purchase) {
            $pendingAmount += $purchase->getPendingAmount();
        }

        $this->netPurchasePendingAmount = $pendingAmount;
    }
}

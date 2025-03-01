<?php

namespace App\Livewire\Purchase;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Purchase;

class PurchaseList extends Component
{
    use ModesTrait;
    use WithPagination;

    // public $purchases;

    public $startDate = null;
    public $endDate = null;
    public $total = 0;

    public $deletingPurchase = null;

    public $modes = [
        'confirmDeletePurchase' => false,
    ];

    protected $listeners = [
        'purchaseDeleted' => 'ackPurchaseDeleted',
        'exitConfirmPurchaseDelete',
    ];

    public function mount(): void
    {
        $this->startDate = date('Y-m-d');
    }

    public function render(): View
    {
        // $this->getPurchasesForDateRange();
        // $this->calculateTotal();

        $purchases = Purchase::orderBy('purchase_id', 'DESC')->paginate(5);

        return view('livewire.purchase.purchase-list')
            ->with('purchases', $purchases);
    }

    public function calculateTotal(): void
    {
        $total = 0;

        foreach ($this->purchases as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        $this->total = $total;
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
            $purchases = Purchase::whereDate('purchase_date', '>=', $validatedData['startDate'])
                ->whereDate('purchase_date', '<=', $validatedData['endDate'])
                ->orderBy('purchase_id', 'desc')
                ->get();
        } else {
            $purchases = Purchase::whereDate('purchase_date', $validatedData['startDate'])
                ->orderBy('purchase_id', 'desc')
                ->get();
        }

        $this->purchases = $purchases;
    }

    public function enterConfirmDeletePurchaseMode(Purchase $purchase): void
    {
        $this->deletingPurchase = $purchase;

        $this->enterMode('confirmDeletePurchase');
    }

    public function exitConfirmPurchaseDelete(): void
    {
        $this->deletingPurchase = null;

        $this->exitMode('confirmDeletePurchase');
    }

    public function ackPurchaseDeleted(): void
    {
        $this->deletingPurchase = null;
        $this->exitMode('confirmDeletePurchase');
        $this->getPurchasesForDateRange();
    }

    public function setPreviousDay(): void
    {
        $this->startDate = Carbon::create($this->startDate)->subDay()->toDateString();
    }

    public function setNextDay(): void
    {
        $this->startDate = Carbon::create($this->startDate)->addDay()->toDateString();
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Purchase;

class PurchaseList extends Component
{
    public $purchases;

    public $startDate;
    public $endDate;
    public $total = 0;

    public $deletingPurchase = null;

    public $modes = [
        'confirmDeletePurchase' => false,
    ];

    protected $listeners = [
        'purchaseDeleted' => 'ackPurchaseDeleted',
        'exitConfirmPurchaseDelete',
    ];

    public function mount()
    {
        $this->purchases = Purchase::orderBy('purchase_id', 'desc')->get();
    }

    public function render()
    {
        $this->calculateTotal();
        return view('livewire.purchase-list');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function calculateTotal()
    {
        $total = 0;

        foreach ($this->purchases as $purchase) {
            $total += $purchase->getTotalAmount();
        }

        $this->total = $total;
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
                ->get();
        } else {
            $purchases = Purchase::whereDate('created_at', $validatedData['startDate'])->get();
        }

        $this->purchases = $purchases;
    }

    public function enterConfirmDeletePurchaseMode(Purchase $purchase)
    {
        $this->deletingPurchase = $purchase;

        $this->enterMode('confirmDeletePurchase');
    }

    public function exitConfirmPurchaseDelete()
    {
        $this->deletingPurchase = null;

        $this->exitMode('confirmDeletePurchase');
    }

    public function ackPurchaseDeleted()
    {
        $this->deletingPurchase = null;
        $this->exitMode('confirmDeletePurchase');
    }
}

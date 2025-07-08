<?php

namespace App\Livewire\Purchase\Dashboard;

use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Traits\MiscTrait;
use App\Traits\ModesTrait;
use App\Models\Vendor\Vendor;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\PurchaseItem;
use App\Models\Purchase\PurchasePaymentType;
use App\Models\Purchase\PurchasePayment;

class PurchaseEditor extends Component
{
    use MiscTrait;
    use ModesTrait;

    public $purchase;
    public $vendor_id;

    public $createNew = true;

    public $vendors = null;

    public $deletingPurchaseItem;

    public $purchase_date;

    public $modes = [
        'addItem' => true,
        'paid' => false,
        'vendorSelected' => false,
        'deletingPurchaseItemMode' => false,
        'backDate' => false,
    ];

    protected $listeners = [
        'itemAddedToPurchase' => 'render',
        'exitMakePaymentMode',
        'exitConfirmPurchaseItemDelete',
        'purchaseItemDeleted' => 'ackPurchaseItemDeleted',
    ];

    public $purchasePaymentTypes;
    public $paid_amount;
    public $purchase_payment_type_id;

    public function mount(): void
    {
        if ($this->createNew == true) {
            $this->purchase = $this->startPurchase();
        }

        if ($this->purchase) {
            if ($this->purchase->vendor) {
                $this->modes['vendorSelected'] = true;
            }
        }
    }

    public function render(): View
    {
        $this->purchasePaymentTypes = PurchasePaymentType::all();
        $this->vendors = Vendor::all();

        return view('livewire.purchase.dashboard.purchase-editor');
    }

    public function startPurchase(): Purchase
    {
        $purchase = new Purchase;

        $purchase->purchase_date = date('Y-m-d');
        $purchase->creation_status = 'progress';

        /* User which created this record. */
        $purchase->creator_id = Auth::user()->id;

        $purchase->save();

        $purchase = $purchase->fresh();
        return $purchase;
    }


    public function linkPurchaseToVendor(): void
    {
        $validatedData = $this->validate([
            'vendor_id' => 'required|integer',
        ]);

        $this->purchase->vendor_id = $validatedData['vendor_id'];
        $this->purchase->save();

        // $this->refresh();
        // $this->render();
    }

    public function exitMakePaymentMode(): void
    {
        $this->enterMode('paid');
    }

    public function linkVendorToPurchase(): void
    {
        $validatedData = $this->validate([
            'vendor_id' => 'required|integer',
        ]);

        $this->purchase->vendor_id = $validatedData['vendor_id'];
        $this->purchase->save();
        $this->purchase = $this->purchase->fresh();

        $this->modes['vendorSelected'] = true;
    }

    public function confirmRemoveItemFromPurchase($purchaseItemId): void
    {
        $purchaseItem = PurchaseItem::find($purchaseItemId);

        $this->deletingPurchaseItem = $purchaseItem;
        $this->modes['deletingPurchaseItemMode'] = true;
    }

    public function exitConfirmPurchaseItemDelete(): void
    {
        $this->deletingPurchaseItem = null;
        $this->modes['deletingPurchaseItemMode'] = false;
    }

    public function ackPurchaseItemDeleted(): void
    {
        $this->exitConfirmPurchaseItemDelete();

        $this->purchase = $this->purchase->fresh();
    }

    public function changePurchaseDate(): void
    {
        $validatedData = $this->validate([
            'purchase_date' => 'required|date',
        ]);

        $purchase = $this->purchase;
        $purchase->purchase_date = $validatedData['purchase_date'];
        $purchase->save();

        $this->purchase = $purchase->fresh();
        $this->modes['backDate'] = false;
        $this->render();
    }
}

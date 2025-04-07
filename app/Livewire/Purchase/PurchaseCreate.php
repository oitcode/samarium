<?php

namespace App\Livewire\Purchase;

use App\Traits\MiscTrait;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Vendor;
use App\Purchase;
use App\PurchaseItem;
use App\PurchasePaymentType;
use App\PurchasePayment;
use App\Traits\ModesTrait;

class PurchaseCreate extends Component
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
        'payment' => true,

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

        return view('livewire.purchase.purchase-create');
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

    public function savePayment(): void
    {
        $validatedData = $this->validate([
            'paid_amount' => 'required|integer',
            'purchase_payment_type_id' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $payment = new PurchasePayment;

            $payment->purchase_id = $this->purchase->purchase_id;
            $payment->purchase_payment_type_id = $validatedData['purchase_payment_type_id'];
            $payment->payment_date = date('Y-m-d');
            $payment->amount = $validatedData['paid_amount'];

            $payment->save();

            $this->purchase->payment_status = 'paid';
            $this->purchase->save();

            /* Make accounting entries */
            //$this->makePurchaseAccountingEntry($this->purchase);

            DB::commit();

            $this->enterMode('paid');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
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
        $this->modes['payment'] = false;
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

<?php

namespace App\Livewire\Purchase;

use App\Traits\MiscTrait;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Vendor;
use App\Purchase;
use App\PurchaseItem;
use App\PurchasePaymentType;
use App\PurchasePayment;

class PurchaseCreate extends Component
{
    use MiscTrait;

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

    public function mount()
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

    public function render()
    {
        $this->purchasePaymentTypes = PurchasePaymentType::all();
        $this->vendors = Vendor::all();

        return view('livewire.purchase.purchase-create');
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

    public function enterModeSilent($modeName)
    {
        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function startPurchase()
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

    public function savePayment()
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

    public function linkPurchaseToVendor()
    {
        $validatedData = $this->validate([
            'vendor_id' => 'required|integer',
        ]);

        $this->purchase->vendor_id = $validatedData['vendor_id'];
        $this->purchase->save();

        // $this->refresh();
        // $this->render();
    }

    public function exitMakePaymentMode()
    {
        $this->modes['payment'] = false;
        $this->enterMode('paid');
    }

    public function linkVendorToPurchase()
    {
        $validatedData = $this->validate([
            'vendor_id' => 'required|integer',
        ]);

        $this->purchase->vendor_id = $validatedData['vendor_id'];
        $this->purchase->save();
        $this->purchase = $this->purchase->fresh();

        $this->modes['vendorSelected'] = true;
    }

    public function confirmRemoveItemFromPurchase($purchaseItemId)
    {
        $purchaseItem = PurchaseItem::find($purchaseItemId);

        $this->deletingPurchaseItem = $purchaseItem;
        $this->modes['deletingPurchaseItemMode'] = true;
    }

    public function exitConfirmPurchaseItemDelete()
    {
        $this->deletingPurchaseItem = null;
        $this->modes['deletingPurchaseItemMode'] = false;
    }

    public function ackPurchaseItemDeleted()
    {
        $this->exitConfirmPurchaseItemDelete();

        $this->purchase = $this->purchase->fresh();
    }

    public function changePurchaseDate()
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

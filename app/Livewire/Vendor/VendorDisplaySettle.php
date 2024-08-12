<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\PurchasePaymentType;
use App\PurchasePayment;

class VendorDisplaySettle extends Component
{
    public $vendor;

    public $purchasePaymentTypes = null;

    public $payment_date;
    public $pay_amount;
    public $deposited_by;
    public $purchase_payment_type_id;

    public function render()
    {
        $this->payment_date = date('Y-m-d');
        $this->purchasePaymentTypes = PurchasePaymentType::all();

        return view('livewire.vendor.vendor-display-settle');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'pay_amount' => 'required|integer',
            'deposited_by' => 'nullable',
            'purchase_payment_type_id' => 'required|integer',
        ]);

        $amountRemaining = $this->pay_amount;

        DB::beginTransaction();

        try {

            /* Check if pending purchase to pay */
            foreach ($this->vendor->getPendingPurchases() as $purchase) {
                /* Stop if no amount remaining. */
                if ($amountRemaining <= 0) {
                    break;
                }

                $amountRemaining = $this->makePurchasePayment($purchase, $amountRemaining, $this->deposited_by);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        /* TODO */
        /* If amount still remaining ask to return or keep the balance */

        $this->dispatch('vendorSettlementMade', amountRemaining: $amountRemaining);
    }

    public function makePurchasePayment($purchase, $amountAvailable, $depositedBy)
    {
        $retval = 0;

        $purchasePayment = new PurchasePayment;

        $purchasePayment->purchase_id = $purchase->purchase_id;
        $purchasePayment->payment_date = $this->payment_date;
        $purchasePayment->deposited_by = $this->deposited_by;

        /* If amount available is not enough for full payment. */
        if ($amountAvailable < $purchase->getPendingAmount()) {
            $purchasePayment->amount = $amountAvailable;
            $purchase->payment_status = 'partially_paid';
        } else {
            /* Enough amount available. */
            $purchasePayment->amount = $purchase->getPendingAmount();
            $purchase->payment_status = 'paid';

            $retval = $amountAvailable - $purchase->getPendingAmount();
        }

        $purchasePayment->purchase_payment_type_id = $this->purchase_payment_type_id;
        $purchasePayment->save();
        $purchase->save();

        return $retval;
    }
}

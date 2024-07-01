<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\PurchasePayment;
use App\PurchasePaymentType;

class VendorPurchasePaymentCreate extends Component
{
    public $purchase;

    public $payment_date;
    public $deposited_by;
    public $purchase_payment_type_id;
    public $pay_amount;

    public $purchasePaymentTypes;

    public function render()
    {
        $this->payment_date = date('Y-m-d');
        $this->purchasePaymentTypes = PurchasePaymentType::all();

        return view('livewire.vendor.vendor-purchase-payment-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'deposited_by' => 'nullable',
            'pay_amount' => 'required|integer',
            'purchase_payment_type_id' => 'required|integer',
        ]);

        $retval = 0;

        DB::beginTransaction();

        try {
            $purchasePayment = new PurchasePayment;

            $purchasePayment->purchase_id = $this->purchase->purchase_id;
            $purchasePayment->payment_date = $this->payment_date;
            $purchasePayment->deposited_by = $this->deposited_by;
            $purchasePayment->purchase_payment_type_id = $this->purchase_payment_type_id;

            /* If amount available is not enough for full payment. */
            if ($this->pay_amount < $this->purchase->getPendingAmount()) {
                $purchasePayment->amount = $this->pay_amount;
                $this->purchase->payment_status = 'partially_paid';
            } else {
                /* Enough amount available. */
                $purchasePayment->amount = $this->purchase->getPendingAmount();
                $this->purchase->payment_status = 'paid';

                $retval = $this->pay_amount - $this->purchase->getPendingAmount();
            }

            $purchasePayment->save();
            $this->purchase->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->emitUp('vendorPurchasePaymentMade');
        //$this->emitUp('customerPaymentMade', 0);
    }
}

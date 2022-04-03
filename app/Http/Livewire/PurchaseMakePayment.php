<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\PurchasePaymentType;
use App\PurchasePayment;

class PurchaseMakePayment extends Component
{
    public $purchase;

    public $modes = [
        'paid' => false,
        'multiplePayments' => false,
    ];

    public $multiPayments = array();

    public $paid_amount;
    public $purchase_payment_type_id;
    public $total;

    public $purchasePaymentTypes;

    public function render()
    {
        $this->purchasePaymentTypes = PurchasePaymentType::all();

        $this->total = $this->purchase->getTotalAmount();

        return view('livewire.purchase-make-payment');
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
        // $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'paid_amount' => 'required|integer',
            'purchase_payment_type_id' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $pendingAmount = $this->purchase->getPendingAmount();

            /* Make purchase payment */
            $purchasePayment = new PurchasePayment;

            $purchasePayment->payment_date = date('y-m-d');
            $purchasePayment->purchase_id = $this->purchase->purchase_id;
            $purchasePayment->purchase_payment_type_id = $this->purchase_payment_type_id;
            $purchasePayment->amount = $validatedData['paid_amount'];

            $purchasePayment->save();


            /* Update purchase's payment status */
            if ($validatedData['paid_amount'] >= $pendingAmount) {
                $this->purchase->payment_status = 'paid';
                $this->purchase->save();
            } else if ($validatedData['paid_amount'] > 0){
                $this->purchase->payment_status = 'partially_paid';
                $this->purchase->save();
            } else {
            }

            DB::commit();

            $this->enterMode('paid');
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

    }

    public function finishPayment()
    {
        $this->emit('exitMakePaymentMode');
    }
}

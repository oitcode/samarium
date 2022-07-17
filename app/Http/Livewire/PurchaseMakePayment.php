<?php

namespace App\Http\Livewire;

use App\Traits\MiscTrait;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\PurchasePaymentType;
use App\PurchasePayment;

use App\PurchaseAdditionHeading;
use App\PurchaseAddition;

class PurchaseMakePayment extends Component
{
    use MiscTrait;

    public $purchase;

    public $has_vat = false;

    public $purchaseAdditions = array();

    public $modes = [
        'paid' => false,
        'multiplePayments' => false,
    ];

    public $multiPayments = array();

    public $paid_amount;
    public $purchase_payment_type_id;
    public $taxable_amount;
    public $total;
    public $sub_total;
    public $vat;
    public $grand_total;

    public $purchasePaymentTypes;

    protected $listeners = [
        'itemAddedToPurchase' => 'render',
    ];

    public function render()
    {
        $this->has_vat = $this->hasVat();

        foreach (PurchaseAdditionHeading::all() as $purchaseAddition) {
            $this->purchaseAdditions += [$purchaseAddition->name => 0];
        }

        $this->purchasePaymentTypes = PurchasePaymentType::all();

        //$this->total = $this->purchase->getTotalAmount();
        $this->sub_total = $this->purchase->getTotalAmountRaw();

        $this->updateNumbers();

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
            /* Make Purchase Additions if needed. */
            foreach ($this->purchaseAdditions as $key => $val) {
                if ($val > 0) {
                    $purchaseAdditionHeading = PurchaseAdditionHeading::where('name', $key)->first();

                    $purchaseAddition = new PurchaseAddition;

                    $purchaseAddition->purchase_id = $this->purchase->purchase_id;
                    $purchaseAddition->purchase_addition_heading_id = $purchaseAdditionHeading->purchase_addition_heading_id;
                    $purchaseAddition->amount = $val;

                    $purchaseAddition->save();
                }
            }

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

            /* Make accounting entries */
            // $this->makePurchaseAccountingEntry($this->purchase);

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

    public function updatedVat()
    {
        $this->updateNumbers();
    }

    public function updatedPurchaesAdditions()
    {
        $this->updateNumbers();
    }

    public function hasVat()
    {
        if (PurchaseAdditionHeading::where('name', 'vat')->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateNumbers()
    {
        $this->taxable_amount = $this->sub_total;

        $this->calculateGrandTotal();
    }

    public function calculateGrandTotal()
    {
        /* Todo: Any validation needed ? */

        /* Todo: Really Hard code VAT ? Better way? */
        if ($this->has_vat) {
            $this->grand_total = $this->taxable_amount + $this->purchaseAdditions['VAT'] ;
        } else {
            $this->grand_total = $this->taxable_amount;
        }
    }
}

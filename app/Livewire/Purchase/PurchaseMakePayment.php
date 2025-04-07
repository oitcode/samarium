<?php

namespace App\Livewire\Purchase;

use App\Traits\MiscTrait;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Traits\ModesTrait;
use App\PurchasePaymentType;
use App\PurchasePayment;
use App\PurchaseAdditionHeading;
use App\SaleInvoiceAdditionHeading;
use App\PurchaseAddition;

class PurchaseMakePayment extends Component
{
    use ModesTrait;
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

    public function render(): View
    {
        $this->has_vat = SaleInvoiceAdditionHeading::where('name', 'vat')->exists();

        foreach (PurchaseAdditionHeading::all() as $purchaseAddition) {
            $this->purchaseAdditions += [$purchaseAddition->name => 0];
        }

        $this->purchasePaymentTypes = PurchasePaymentType::all();

        //$this->total = $this->purchase->getTotalAmount();
        $this->sub_total = $this->purchase->getTotalAmountRaw();

        $this->updateNumbers();

        return view('livewire.purchase.purchase-make-payment');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'grand_total' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'paid_amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'purchase_payment_type_id' => 'required|integer',
        ]);

        if ($validatedData['paid_amount'] > $validatedData['grand_total']) {
            return;
        }

        /* Vendor compulsory if tender amount is less than grand total. */
        if (! $this->purchase->vendor
            && $validatedData['paid_amount'] < $validatedData['grand_total']) {
            return;
        }

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

            $this->purchase->creation_status = 'created';
            $this->purchase->save();

            /* Make accounting entries */
            // $this->makePurchaseAccountingEntry($this->purchase);

            DB::commit();

            $this->enterMode('paid');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

    }

    public function finishPayment(): void
    {
        $this->dispatch('exitMakePaymentMode');
    }

    public function updatedVat(): void
    {
        $this->updateNumbers();
    }

    public function updatedPurchaesAdditions(): void
    {
        $this->updateNumbers();
    }

    public function updateNumbers(): void
    {
        $this->taxable_amount = $this->sub_total;

        $this->calculateGrandTotal();
    }

    public function calculateGrandTotal(): void
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

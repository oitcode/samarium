<?php

namespace App\Http\Livewire;

use App\Traits\MiscTrait;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Purchase;
use App\PurchasePaymentType;
use App\PurchasePayment;

class PurchaseCreate extends Component
{
    use MiscTrait;

    public $purchase;

    public $modes = [
        'addItem' => true,
        'paid' => false,
    ];

    protected $listeners = [
        'itemAddedToPurchase' => 'render',
    ];

    public $purchasePaymentTypes;
    public $paid_amount;
    public $purchase_payment_type_id;

    public function mount()
    {
        $this->purchase = $this->startPurchase();
    }

    public function render()
    {
        $this->purchasePaymentTypes = PurchasePaymentType::all();

        return view('livewire.purchase-create');
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

    public function startPurchase()
    {
        $purchase = new Purchase;
        $purchase->save();

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
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }
}

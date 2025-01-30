<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\SaleInvoice;
use App\SaleInvoicePayment;
use App\SaleInvoicePaymentType;

class CustomerPaymentCreate extends Component
{
    public $customer;
    public $saleInvoicePaymentTypes;

    public $payment_date;
    public $pay_amount;
    public $deposited_by;
    public $sale_invoice_payment_type_id;

    public function render()
    {
        $this->payment_date = date('Y-m-d');
        $this->saleInvoicePaymentTypes = SaleInvoicePaymentType::all();

        return view('livewire.customer.customer-payment-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'pay_amount' => 'required|integer',
            'deposited_by' => 'nullable',
            'sale_invoice_payment_type_id' => 'required|integer',
        ]);

        $amountRemaining = $this->pay_amount;

        DB::beginTransaction();

        try {
            /* Check if pending sale invoice to pay */
            foreach ($this->customer->getPendingSaleInvoices() as $saleInvoice) {
                /* Stop if no amount remaining. */
                if ($amountRemaining <= 0) {
                    break;
                }

                $amountRemaining = $this->receiveSaleInvoicePayment($saleInvoice, $amountRemaining, $this->deposited_by);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        /* TODO */
        /* If amount still remaining ask to return or keep the balance */

        $this->dispatch('customerPaymentMade', amountRemaining: $amountRemaining);
    }

    public function receiveSaleInvoicePayment($saleInvoice, $amountAvailable, $depositedBy)
    {
        $retval = 0;

        $saleInvoicePayment = new saleInvoicePayment;

        $saleInvoicePayment->sale_invoice_id = $saleInvoice->sale_invoice_id;
        $saleInvoicePayment->payment_date = $this->payment_date;
        $saleInvoicePayment->deposited_by = $this->deposited_by;

        /* If amount available is not enough for full payment. */
        if ($amountAvailable < $saleInvoice->getPendingAmount()) {
            $saleInvoicePayment->amount = $amountAvailable;
            $saleInvoice->payment_status = 'partially_paid';
        } else {
            /* Enough amount available. */
            $saleInvoicePayment->amount = $saleInvoice->getPendingAmount();
            $saleInvoice->payment_status = 'paid';

            $retval = $amountAvailable - $saleInvoice->getPendingAmount();
        }

        $saleInvoicePayment->sale_invoice_payment_type_id = $this->sale_invoice_payment_type_id;
        $saleInvoicePayment->save();
        $saleInvoice->save();

        return $retval;
    }
}

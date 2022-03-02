<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Customer;
use App\SaleInvoice;
use App\SaleInvoicePayment;

class SeatTableWorkDisplayMakePayment extends Component
{
    public $seatTable;

    public $total;
    public $pay_by;
    public $tender_amount;

    public $returnAmount;

    /* Customer to which sale_invoice will be made */
    public $customer;

    /* Customer info */
    public $customer_name;
    public $customer_phone;
    public $customer_address;
    public $customer_pan;

    public $modes = [
        'paid' => false,
        'customer' => false,
    ];

    public function mount()
    {
        $this->total = $this->seatTable->getCurrentBookingTotalAmount();
    }
    public function render()
    {
        return view('livewire.seat-table-work-display-make-payment');
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

    public function store()
    {
        $validatedData = $this->validate([
            'tender_amount' => 'required|integer',

        ]);

        if ($this->modes['customer']) {
            $validatedData2 = $this->validate([
                'customer_name' => 'required',
                'customer_phone' => 'required',
                'customer_address' => 'nullable',
                'customer_pan' => 'nullable',
            ]);
        }

        /* Get the sale_invoice */
        $saleInvoice = $this->seatTable->getCurrentBooking()->saleInvoice;

        /* Final Payment Status */
        $finalPaymentStatus = $saleInvoice->payment_status;

        /* Get current booking/invoice amount */
        $currentBookingAmount = $this->seatTable->getCurrentBookingTotalAmount();

        /* If no customer do not take less payments !!! */
        if (! $this->modes['customer'] && $this->tender_amount < $currentBookingAmount) {
            return;
        }

        DB::beginTransaction();

        /*
         * Do Customer stuff if needed.
         *
         */

        try {
            if ($this->modes['customer']) {
                $customer = Customer::where('phone', $this->customer_phone)->first();
                if (! $customer) {
                    $customer = new Customer;

                    $customer->name = $this->customer_name;
                    $customer->phone = $this->customer_phone;;
                    if ($this->customer_address) {
                        $customer->address = $this->customer_address;;
                    }
                    if ($this->customer_pan) {
                        $customer->pan_number = $this->customer_pan;;
                    }

                    $customer->save();
                }
            }

            /*
             *
             * Todo: Make payment against an invoice
             *
             */


            if ($this->modes['customer']) {
                $saleInvoice->customer_id = $customer->customer_id;
                $saleInvoice->save();
            }

            /* If payment receied then create a payment record. */
            if ($this->tender_amount > 0) {
                /* Make sale_invoice_payment */
                $saleInvoicePayment = new SaleInvoicePayment;

                $saleInvoicePayment->payment_date = date('Y-m-d');
                $saleInvoicePayment->sale_invoice_id = $saleInvoice->sale_invoice_id;

                if ($this->tender_amount < $currentBookingAmount) {
                    $saleInvoicePayment->amount = $this->tender_amount;
                    $this->returnAmount = 0;
                    $finalPaymentStatus = 'partially_paid';
                } else {
                    $saleInvoicePayment->amount = $currentBookingAmount;
                    $this->returnAmount = $this->tender_amount - $currentBookingAmount;
                    $finalPaymentStatus = 'paid';
                }

                $saleInvoicePayment->save();
            }


            /* Update payment_status of sale invoice */
            $saleInvoice->payment_status = $finalPaymentStatus;
            $saleInvoice->save();

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
        $booking = $this->seatTable->getCurrentBooking();
        $booking->status = 'closed';
        $booking->save();

        $this->emit('exitMakePaymentMode');
    }

    public function fetchCustomerData()
    {
        $customer = Customer::where('phone', $this->customer_phone)->first();

        if ($customer) {
            $this->customer = $customer;

            $this->customer_name = $customer->name;
            $this->customer_address = $customer->address;
        }
    }
}

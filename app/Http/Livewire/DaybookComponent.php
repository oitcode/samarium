<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;

use App\Sale;
use App\SaleInvoice;
use App\SeatTableBooking;

class DaybookComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $daybookDate;
    //public $saleInvoices;

    public $totalAmount;
    public $totalCashAmount;
    public $totalCreditAmount;

    public $seatTableBookings;
    public $totalBookingAmount;

    public $displayingSaleInvoice;

    public $modes = [
        'displaySaleInvoice' => false,
    ];

    protected $listeners = [
        'exitDisplaySaleInvoiceMode',
    ];

    public function mount()
    {
        $this->daybookDate = date('Y-m-d');
    }

    public function render()
    {
        $saleInvoices = SaleInvoice::where('sale_invoice_date', $this->daybookDate)->orderBy('sale_invoice_id', 'desc')->paginate(100);

        $this->totalAmount = $this->getTotalAmount($saleInvoices);
        // $this->totalCashAmount = $this->getTotalCashAmount();
        // $this->totalCreditAmount = $this->getTotalCreditAmount();
        $this->totalSaleAmount = $this->getTotalSaleAmount($saleInvoices);

        return view('livewire.daybook-component')
            ->with('saleInvoices', $saleInvoices);
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

    public function setPreviousDay()
    {
        $this->clearModes();
        $this->daybookDate = Carbon::create($this->daybookDate)->subDay()->toDateString();
    }

    public function setNextDay()
    {
        $this->clearModes();
        $this->daybookDate = Carbon::create($this->daybookDate)->addDay()->toDateString();
    }

    public function getTotalAmount($saleInvoices)
    {
        $total = 0;

        foreach($saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function getTotalCashAmount()
    {
        $total = 0;

        foreach($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getPaidAmount();
        }

        return $total;
    }

    public function getTotalCreditAmount()
    {
        $total = 0;

        foreach($this->saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getPendingAmount();
        }

        return $total;
    }

    public function getTotalBookingAmount()
    {
        $total = 0;

        foreach($this->seatTableBookings as $booking) {
            $total += $booking->getTotalAmount();
        }

        return $total;
    }

    public function displaySaleInvoice(SaleInvoice $saleInoice)
    {
        $this->displayingSaleInvoice = $saleInoice;
        if ($this->modes['displaySaleInvoice']) {
            $this->exitMode('displayBooking');
        } else {
            $this->enterMode('displaySaleInvoice');
        }
    }

    public function getTotalSaleAmount($saleInvoices)
    {
        $total = 0;

        foreach ($saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function exitDisplaySaleInvoiceMode()
    {
        $this->displayingSaleInvoice = null;
        $this->exitMode('displaySaleInvoice');
    }
}

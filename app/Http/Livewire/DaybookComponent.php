<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithPagination;

use App\Sale;
use App\SaleInvoice;
use App\SaleInvoiceItem;
use App\SeatTableBooking;
use App\SaleInvoicePaymentType;
use App\Product;

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

    public $paymentByType = array();

    public $todayItems = array();

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

        $this->paymentByType = array();
        foreach (SaleInvoicePaymentType::all() as $saleInvoicePaymentType) {
            $this->paymentByType += array(
                $saleInvoicePaymentType->name
                =>
                $this->getPaymentTotalByType($saleInvoices, $saleInvoicePaymentType->sale_invoice_payment_type_id)
            );
        }

        $this->getSaleItemQuantity($saleInvoices);

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

    public function getPaymentTotalByType($saleInvoices, $paymentTypeId)
    {
        $paymentType = SaleInvoicePaymentType::find($paymentTypeId);

        $total = 0;

        foreach ($saleInvoices as $saleInvoice) {
            foreach ($saleInvoice->saleInvoicePayments as $saleInvoicePayment) {
                if ($saleInvoicePayment->sale_invoice_payment_type_id == $paymentTypeId) {
                    $total += $saleInvoicePayment->amount;
                }
            }
        }

        return $total;
    }

    public function getSaleItemQuantity($saleInvoices)
    {
        $this->todayItems = array();

        foreach ($saleInvoices as $saleInvoice) {
            foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem) {
                if ($this->itemInTodayItems($saleInvoiceItem->product)) {
                    $this->updateTodayItemsCount($saleInvoiceItem);
                } else {
                    $this->addToTodayItemsCount($saleInvoiceItem);
                }
            }
        }
    }

    public function itemInTodayItems(Product $product)
    {
        foreach ($this->todayItems as $item) {
            if ($item['product']->product_id == $product->product_id) {
                return true;
            }
        }

        return false;
    }

    public function updateTodayItemsCount(SaleInvoiceItem $saleInvoiceItem)
    {
        for ($i=0; $i < count($this->todayItems); $i++) {
            if ($this->todayItems[$i]['product']->product_id == $saleInvoiceItem->product->product_id) {
                $this->todayItems[$i]['quantity'] += $saleInvoiceItem->quantity;
                break;
            }
        }
    }

    public function addToTodayItemsCount(SaleInvoiceItem $saleInvoiceItem)
    {
        $line = array();

        $line['product'] = $saleInvoiceItem->product;
        $line['quantity'] = $saleInvoiceItem->quantity;

        $this->todayItems[] = $line;
    }
}

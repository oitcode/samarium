<?php

namespace App\Http\Livewire\RecordBook;

use Livewire\Component;
use Carbon\Carbon;

use App\SaleInvoice;

class ViewbookComponent extends Component
{
    public $modes = [
        'daybook' => false,
        'weekbook' => false,
        'monthbook' => false,
        'yearbook' => false,
    ];

    public $unitName;
    public $totalAmount = 0;

    public $startDate = null;
    public $endDate = null;

    public $book = array();

    public function render()
    {
        if ($this->startDate && $this->endDate) {
            $this->totalAmount = $this->getTotalAmount($this->startDate->format('Y-m-d'), $this->endDate->format('Y-m-d'));
            $this->populateBook();
        }

        return view('livewire.record-book.viewbook-component');
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

    public function enterDaybookMode()
    {
        $this->unitName = 'Time';

        $this->startDate = Carbon::now();
        $this->endDate = Carbon::now();

        $this->enterMode('daybook');
    }

    public function enterWeekbookMode()
    {
        $this->unitName = 'Date';

        $this->startDate = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $this->endDate = $this->startDate->copy()->addDays(6);

        $this->enterMode('weekbook');
    }

    public function enterMonthbookMode()
    {
        $this->unitName = 'Date';

        $this->startDate = Carbon::now()->startOfMonth();
        $this->endDate = Carbon::now()->endOfMonth();

        $this->enterMode('monthbook');
    }

    public function enterYearbookMode()
    {
        $this->unitName = 'Month';

        $this->startDate = Carbon::now()->startOfYear();
        $this->endDate = Carbon::now()->endOfYear();

        $this->enterMode('yearbook');
    }

    public function getTotalAmount($startDate, $endDate)
    {
        $saleInvoices = SaleInvoice::whereDate('sale_invoice_date', '>=',  $startDate)
            ->whereDate('sale_invoice_date', '<=',  $endDate)
            ->get();

        $total = 0;

        foreach ($saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function populateBook()
    {
        if ($this->modes['daybook']) {
            $this->endDate = $this->startDate->copy();
        } else if ($this->modes['weekbook']) {
            $this->endDate = $this->startDate->copy()->addDays(6);
        } else if ($this->modes['monthbook']) {
            $this->endDate = $this->startDate->copy()->endOfMonth();
        } else if ($this->modes['yearbook']) {
            $this->endDate = $this->startDate->copy()->endOfYear();
        } else {
            dd('Whoops');
        }

        $saleInvoices = SaleInvoice::whereDate('sale_invoice_date', '>=',  $this->startDate)
            ->whereDate('sale_invoice_date', '<=',  $this->endDate)
            ->get();

        if ($this->modes['daybook']) {
            $this->book = array();

            foreach ($saleInvoices as $saleInvoice) {
                $this->book[] = [
                    'unit' => $saleInvoice->created_at,
                    'totalAmount' => $saleInvoice->getTotalAmount(),
                ];
            }
        } else if ($this->modes['weekbook']) {
            $this->book = array();

            $day = $this->startDate->copy();

            for ($i = 0; $i < 7; $i++) {
                $this->book[] = [
                    'unit' => $day->copy(),
                    'totalAmount' => $this->getTotalAmountOfDay($day),
                ];

                $day = $day->addDay();
            }
        } else if ($this->modes['monthbook']) {
            $this->book = array();

            $day = $this->startDate->copy();

            for ($i = 0; $day <= $this->endDate; $i++) {
                $this->book[] = [
                    'unit' => $day->copy(),
                    'totalAmount' => $this->getTotalAmountOfDay($day),
                ];

                $day = $day->addDay();
            }
        } else if ($this->modes['yearbook']) {
            $this->book = array();

            $day = $this->startDate->copy();

            for ($i = 0; $i < 12; $i++) {
                $this->book[] = [
                    'unit' => $day->format('F'),
                    'totalAmount' => $this->getTotalAmountOfMonth($day),
                ];

                $day = $day->addMonth();
            }
        } else {
          dd ('Whoops');
        }
    }

    public function getTotalAmountOfDay($day)
    {
        $saleInvoices = SaleInvoice::where('sale_invoice_date', $day->format('Y-m-d'))->get();

        $total = 0;

        foreach ($saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function getTotalAmountOfMonth($firstDayOfMonth)
    {
        $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();

        $saleInvoices = SaleInvoice::whereDate('sale_invoice_date', '>=', $firstDayOfMonth->format('Y-m-d'))
            ->whereDate('sale_invoice_date', '<=', $lastDayOfMonth->format('Y-m-d'))
            ->get();

        $total = 0;

        foreach ($saleInvoices as $saleInvoice) {
            $total += $saleInvoice->getTotalAmount();
        }

        return $total;
    }

    public function goToPrevious($unit)
    {
        if ($unit == 'day') {
            $this->startDate->subDay();
            $this->endDate = $this->startDate->copy();
        } else if ($unit == 'week') {
            $this->startDate->subWeek();
            $this->endDate = $this->startDate->copy()->addDays(6);
        } else if ($unit == 'month') {
            $this->startDate->subMonth();
            $this->endDate = $this->startDate->copy()->endOfMonth();
        } else if ($unit == 'year') {
            $this->startDate->subYear();
            $this->endDate = $this->startDate->copy()->endOfYear();
        } else {
            dd('Whoops');
        }
    }

    public function goToNext($unit)
    {
        if ($unit == 'day') {
            $this->startDate->addDay();
            $this->endDate = $this->startDate->copy();
        } else if ($unit == 'week') {
            $this->startDate->addWeek();
            $this->endDate = $this->startDate->copy()->addDays(6);
        } else if ($unit == 'month') {
            $this->startDate->addMonth();
            $this->endDate = $this->startDate->copy()->endOfMonth();
        } else if ($unit == 'year') {
            $this->startDate->addYear();
            $this->endDate = $this->startDate->copy()->endOfYear();
        } else {
            dd('Whoops');
        }
    }

    public function inMode()
    {
        return in_array(true, $this->modes) ;
    }
}

<?php

namespace App\Http\Livewire\Chart;

use Livewire\Component;
use Carbon\Carbon;

use App\SaleInvoice;

class ChartWeekSales extends Component
{
    public $weekSales = array();

    public function render()
    {
        $this->populateWeekSales();

        return view('livewire.chart.chart-week-sales');
    }

    public function populateWeekSales()
    {
        $this->weekSales = array();

        $startDay = Carbon::now()->startOfWeek(Carbon::SUNDAY);

        $day = $startDay->copy();

        for ($i = 0; $i < 7; $i++) {
            $this->weekSales[$day->copy()->format('l')] = $this->getTotalAmountOfDay($day);

            $day = $day->addDay();
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
}

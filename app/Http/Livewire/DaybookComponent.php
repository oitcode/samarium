<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use App\Sale;

class DaybookComponent extends Component
{
    public $daybookDate;
    public $sales;

    public $totalAmount;
    public $totalCashAmount;
    public $totalCreditAmount;

    public function mount()
    {
        $this->daybookDate = date('Y-m-d');
    }

    public function render()
    {
        $this->sales = Sale::where('sale_date', $this->daybookDate)->get();

        $this->totalAmount = $this->getTotalAmount();
        $this->totalCashAmount = $this->getTotalCashAmount();
        $this->totalCreditAmount = $this->getTotalCreditAmount();

        return view('livewire.daybook-component');
    }

    public function setPreviousDay()
    {
        $this->daybookDate = Carbon::create($this->daybookDate)->subDay()->toDateString();
    }

    public function setNextDay()
    {
        $this->daybookDate = Carbon::create($this->daybookDate)->addDay()->toDateString();
    }

    public function getTotalAmount()
    {
        $total = 0;

        foreach($this->sales as $sale) {
            $total += $sale->getTotalAmount();
        }

        return $total;
    }

    public function getTotalCashAmount()
    {
        $total = 0;

        foreach($this->sales as $sale) {
            $total += $sale->getTotalAmount();
        }

        return $total;
    }

    public function getTotalCreditAmount()
    {
        $total = 0;

        // Todo

        return $total;
    }
}

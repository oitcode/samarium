<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Customer;
use App\Sale;
use App\SaleItem;

class SaleCreate extends Component
{
    public $customer;

    public $customerData = [
        'name' => null,
        'phone' => null,
        'email' => null,
        'address' => null,
        'pan_num' => null,
    ];
    public $c_name;
    public $c_phone;

    public $saleItems = array();
    public $customers;

    public $totalNumOfRows = 1;

    public $total = 0;

    public function render()
    {
        return view('livewire.sale-create');
    }

    public function store()
    {
        /* Todo: Validation */

        $customer = new Customer;

        $customer->name = $this->c_name;
        $customer->phone = $this->c_phone;

        $customer->save();

        $sale = new Sale;

        $sale->customer_id = $customer->customer_id; 
        $sale->sale_date = date('Y-m-d'); 

        $sale->save();

        foreach ($this->saleItems as $item) {
            $saleItem = new SaleItem;

            $saleItem->sale_id = $sale->sale_id;
            $saleItem->title = $item['title'];
            $saleItem->amount = $item['amount'];
            $saleItem->save();
        }

        $this->emit('clearModes');
    }

    public function addRow()
    {
        $this->totalNumOfRows++;
    }

    public function clearSheet()
    {
        $this->remittanceLines = [];
        $this->totalNumOfRows = 1;
    }

    public function calculateTotal()
    {
        $total = 0;

        foreach ($this->saleItems as $saleItem) {
            $total += $saleItem['amount'];
        }

        $this->total = $total;
    }
}

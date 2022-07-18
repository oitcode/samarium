<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Company;

class CoreSaleInvoiceDisplay extends Component
{
    public $saleInvoice;
    public $company;

    public $modes = [
        'showPayments' => false,
    ];

    public function render()
    {
        $this->company = Company::first();

        return view('livewire.core-sale-invoice-display');
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
}

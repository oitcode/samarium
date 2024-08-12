<?php

namespace App\Livewire\Core;

use Livewire\Component;
use App\Company;

use App\SaleInvoiceAdditionHeading;

class CoreSaleInvoiceDisplay extends Component
{
    public $saleInvoice;
    public $company;

    public $has_vat;
    public $display_toolbar = true;

    public $modes = [
        'showPayments' => false,
    ];

    public function render()
    {
        $this->company = Company::first();

        $this->has_vat = $this->hasVat();

        return view('livewire.core.core-sale-invoice-display');
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

    public function hasVat()
    {
        if (SaleInvoiceAdditionHeading::where('name', 'vat')->first()) {
            return true;
        } else {
            return false;
        }
    }
}

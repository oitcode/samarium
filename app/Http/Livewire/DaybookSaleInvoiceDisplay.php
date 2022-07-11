<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SaleInvoiceAdditionHeading;

class DaybookSaleInvoiceDisplay extends Component
{
    public $saleInvoice;

    public $has_vat;

    public $modes = [
        'showPayments' => false,
    ];

    public function mount()
    {
        $this->has_vat = $this->hasVat();
    }

    public function render()
    {
        return view('livewire.daybook-sale-invoice-display');
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

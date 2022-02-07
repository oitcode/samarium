<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Sale;

class SaleComponent extends Component
{
    public $displayingSale = null;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'update' => false,
        'delete' => false,
    ];

    protected $listeners = [
        'clearModes',
        'displaySale',
    ];

    public function render()
    {
        return view('livewire.sale-component');
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

    public function displaySale($saleId)
    {
        $sale = Sale::findOrFail($saleId);

        $this->displayingSale = $sale;
        $this->enterMode('display');
    }
}

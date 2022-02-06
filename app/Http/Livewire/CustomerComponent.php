<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Customer;

class CustomerComponent extends Component
{
    public $displayingCustomer;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'update' => false,
        'delete' => false,
    ];

    protected $listeners = [
        'clearModes',
        'displayCustomer',
    ];

    public function render()
    {
        return view('livewire.customer-component');
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

    public function displayCustomer($customerId)
    {
        $customer = Customer::findOrFail($customerId);

        $this->displayingCustomer = $customer;
        $this->enterMode('display');
    }
}

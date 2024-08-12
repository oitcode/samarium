<?php

namespace App\Livewire\Customer;

use Livewire\Component;

use App\Customer;

class CustomerComponent extends Component
{
    public $displayingCustomer;

    public $modes = [
        'create' => false,
        'list' => true,
        'display' => false,
        'update' => false,
        'delete' => false,
        'search' => false,
    ];

    protected $listeners = [
        'clearModes',
        'displayCustomer',
        'exitCreateMode',

        'customerCreated' => 'ackCustomerCreated',
        'exitCustomerDisplayMode',
    ];

    public $totalCustomers;
    public $totalDebtors;

    public function render()
    {
        $this->totalCustomers = Customer::count();

        $this->totalDebtors = 0;
        foreach (Customer::all() as $customer) {
            if ($customer->getBalance()) {
                $this->totalDebtors++;
            }
        }

        return view('livewire.customer.customer-component');
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

    public function exitCreateMode()
    {
        $this->exitMode('create');
    }

    public function ackCustomerCreated()
    {
        session()->flash('message', 'Customer created');

        $this->exitMode('create');
    }

    public function exitCustomerDisplayMode()
    {
        $this->displayingCustomer = null;
        $this->clearModes();
    }
}

<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Customer;

class CustomerComponent extends Component
{
    use ModesTrait;

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

    public function render(): View
    {
        $this->totalCustomers = Customer::count();

        $this->totalDebtors = 0;
        foreach (Customer::all() as $customer) {
            if ($customer->getBalance()) {
                $this->totalDebtors++;
            }
        }

        return view('livewire.customer.dashboard.customer-component');
    }

    public function displayCustomer($customerId): void
    {
        $customer = Customer::findOrFail($customerId);

        $this->displayingCustomer = $customer;
        $this->enterMode('display');
    }

    public function exitCreateMode(): void
    {
        $this->exitMode('create');
    }

    public function ackCustomerCreated(): void
    {
        session()->flash('message', 'Customer created');

        $this->exitMode('create');
    }

    public function exitCustomerDisplayMode(): void
    {
        $this->displayingCustomer = null;
        $this->clearModes();
    }
}

<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Customer;

class CustomerList extends Component
{
    use WithPagination;

    // public $customers;

    public $total;
    public $customersCount;

    public $customerSearch = [
        'name' => null,
        'phone' => null,
        'email' => null,
        'address' => null,
    ];

    public function mount(): void
    {
        $this->total = Customer::count();
    }

    public function render(): View
    {
        $customers = Customer::orderBy('customer_id', 'DESC')->paginate(5);
        $this->customersCount = Customer::count();

        return view('livewire.customer.customer-list')
            ->with('customers', $customers);
    }

    public function search(): void
    {
        $this->customers = new Customer;

        if ($this->customerSearch['name']) {
            $this->customers = $this->customers->where('name', 'like', '%'.$this->customerSearch['name'].'%');
        } 

        if ($this->customerSearch['phone']) {
            $this->customers = $this->customers->where('phone', 'like', '%'.$this->customerSearch['phone'].'%');
        } 

        $this->customers = $this->customers->get();
    }

    public function getCreditors(): void
    {
        $customers = Customer::all();

        foreach ($customers as $key => $customer) {
            if ($customer->getBalance() <= 0) {
              // remove this element
              unset($customers[$key]);
            }
        }

        $this->customers = $customers;
    }
}

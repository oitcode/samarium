<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Shop\CustomerService;
use App\Customer;

/**
 * CustomerList Component
 * 
 * This Livewire component handles the listing of customers.
 * It also handles deletion of customers.
 */
class CustomerList extends Component
{
    use ModesTrait;
    use WithPagination;

    /**
     * Customers per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of customers
     *
     * @var int
     */
    public $totalCustomerCount;

    /**
     * Customer which needs to be deleted
     *
     * @var Customer
     */
    public $deletingCustomer = null;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(CustomerService $customerService): View
    {
        $customers = $customerService->getPaginatedCustomers($this->perPage);
        $this->totalCustomerCount = $customerService->getTotalCustomerCount();

        return view('livewire.customer.customer-list', [
            'customers' => $customers,
        ]);
    }

    /**
     * Confirm if user really wants to delete a customer
     *
     * @return void
     */
    public function confirmDeleteCustomer(int $customer_id, CustomerService $customerService): void
    {
        $this->deletingCustomer = Customer::find($customer_id);

        if ($customerService->canDeleteCustomer($customer_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel customer delete
     *
     * @return void
     */
    public function cancelDeleteCustomer(): void
    {
        $this->deletingCustomer = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a customer cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteCustomer(): void
    {
        $this->deletingCustomer = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete customer
     *
     * @return void
     */
    public function deleteCustomer(CustomerService $customerService): void
    {
        $customerService->deleteCustomer($this->deletingCustomer->customer_id);
        $this->deletingCustomer = null;
        $this->exitMode('confirmDelete');
    }
}

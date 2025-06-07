<?php

namespace App\Services\Shop;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Customer\Customer;

class CustomerService
{
    /**
     * Get paginated list of customers
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedCustomers(int $perPage = 5): LengthAwarePaginator
    {
        return Customer::orderBy('customer_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new customer
     *
     * @param array $data
     * @return Customer
     */
    public function createCustomer(array $data): void // Todo
    {
        // Todo
    }

    /**
     * Check if a customer can be deleted.
     *
     * @param int $customer_id
     * @return bool
     */
    public function canDeleteCustomer(int $customer_id): bool
    {
        $customer = Customer::find($customer_id);

        if (count($customer->saleInvoices) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete customer
     *
     * @param int $customer_id
     * @return void
     */
    public function deleteCustomer(int $customer_id): void
    {
        $customer = Customer::find($customer_id);

        // Todo: Delete customer related rows from other tables

        $customer->delete();
    }

    /**
     * Get total customer count
     *
     * @return int
     */
    public function getTotalCustomerCount(): int
    {
        return Customer::count();
    }
}

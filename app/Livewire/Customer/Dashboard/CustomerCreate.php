<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Customer\Customer;
use App\Models\Accounting\AbAccount;
use App\Models\Accounting\AbAccountType;

class CustomerCreate extends Component
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $pan_num;

    public function render(): View
    {
        return view('livewire.customer.dashboard.customer-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable',
            'address' => 'nullable',
            'pan_num' => 'nullable',
        ]);

        DB::beginTransaction();

        try {
            /* Create an ab_account for customer */
            $abAccount = new AbAccount;
            $abAccount->name = $validatedData['name'] . ' ' . $validatedData['phone'];
            $abAccount->ab_account_type_id = AbAccountType::where('name', 'Asset')->first()->getKey();
            $abAccount->save();

            $validatedData['ab_account_id'] = $abAccount->ab_account_id;

            /* Create customer */
            Customer::create($validatedData);

            DB::commit();

            $this->dispatch('customerCreated');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }
    }
}

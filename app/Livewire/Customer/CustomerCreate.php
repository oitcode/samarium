<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Customer;
use App\AbAccount;
use App\AbAccountType;

class CustomerCreate extends Component
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $pan_num;

    public function render()
    {
        return view('livewire.customer.customer-create');
    }

    public function store()
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

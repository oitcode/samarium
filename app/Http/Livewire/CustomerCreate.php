<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Customer;
use App\AbAccount;

class CustomerCreate extends Component
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $pan_num;

    public function render()
    {
        return view('livewire.customer-create');
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
            $abAccount->save();

            $validatedData['ab_account_id'] = $abAccount->ab_account_id;

            /* Create customer */
            Customer::create($validatedData);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->emit('clearModes');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Vendor;
use App\AbAccount;
use App\AbAccountType;

class VendorCreate extends Component
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $pan_num;

    public function render()
    {
        return view('livewire.vendor-create');
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
            /* Create an ab_account for vendor */
            $abAccount = new AbAccount;
            $abAccount->name = $validatedData['name'];
            $abAccount->ab_account_type_id = AbAccountType::where('name', 'Liabilities')->first()->getKey();
            $abAccount->save();

            $validatedData['ab_account_id'] = $abAccount->ab_account_id;

            /* Create vendor */
            Vendor::create($validatedData);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd ($e);
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->emit('vendorCreated');
    }
}

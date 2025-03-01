<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use Illuminate\View\View;
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

    public function render(): View
    {
        return view('livewire.vendor.vendor-create');
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
            session()->flash('errorDbTransaction', 'Some error in DB transaction.');
        }

        $this->dispatch('vendorCreated');
    }
}

<?php

namespace App\Livewire\Vendor\Dashboard;

use Livewire\Component;

class VendorEditPhone extends Component
{
    public $vendor;

    public $phone;

    public function mount()
    {
        $this->phone = $this->vendor->phone;
    }

    public function render()
    {
        return view('livewire.vendor.dashboard.vendor-edit-phone');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'phone' => 'required',
        ]);

        $this->vendor->phone = $validatedData['phone'];
        $this->vendor->save();

        $this->dispatch('vendorUpdatePhoneCompleted');
    }
}

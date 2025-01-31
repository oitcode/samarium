<?php

namespace App\Livewire\Vendor\Dashboard;

use Livewire\Component;

class VendorEditEmail extends Component
{
    public $vendor;

    public $email;

    public function mount()
    {
        $this->email = $this->vendor->email;
    }

    public function render()
    {
        return view('livewire.vendor.dashboard.vendor-edit-email');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'email' => 'required',
        ]);

        $this->vendor->email = $validatedData['email'];
        $this->vendor->save();

        $this->dispatch('vendorUpdateEmailCompleted');
    }
}

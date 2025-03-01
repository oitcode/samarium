<?php

namespace App\Livewire\Vendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class VendorEditPhone extends Component
{
    public $vendor;

    public $phone;

    public function mount(): void
    {
        $this->phone = $this->vendor->phone;
    }

    public function render(): View
    {
        return view('livewire.vendor.dashboard.vendor-edit-phone');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'phone' => 'required',
        ]);

        $this->vendor->phone = $validatedData['phone'];
        $this->vendor->save();

        $this->dispatch('vendorUpdatePhoneCompleted');
    }
}

<?php

namespace App\Livewire\Vendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class VendorEditEmail extends Component
{
    public $vendor;

    public $email;

    public function mount(): void
    {
        $this->email = $this->vendor->email;
    }

    public function render(): View
    {
        return view('livewire.vendor.dashboard.vendor-edit-email');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'email' => 'required',
        ]);

        $this->vendor->email = $validatedData['email'];
        $this->vendor->save();

        $this->dispatch('vendorUpdateEmailCompleted');
    }
}

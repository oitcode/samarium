<?php

namespace App\Livewire\Vendor\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class VendorEditName extends Component
{
    public $vendor;

    public $name;

    public function mount(): void
    {
        $this->name = $this->vendor->name;
    }

    public function render(): View
    {
        return view('livewire.vendor.dashboard.vendor-edit-name');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->vendor->name = $validatedData['name'];
        $this->vendor->save();

        $this->dispatch('vendorUpdateNameCompleted');
    }
}

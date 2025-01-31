<?php

namespace App\Livewire\Vendor\Dashboard;

use Livewire\Component;

class VendorEditName extends Component
{
    public $vendor;

    public $name;

    public function mount()
    {
        $this->name = $this->vendor->name;
    }

    public function render()
    {
        return view('livewire.vendor.dashboard.vendor-edit-name');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->vendor->name = $validatedData['name'];
        $this->vendor->save();

        $this->dispatch('vendorUpdateNameCompleted');
    }
}

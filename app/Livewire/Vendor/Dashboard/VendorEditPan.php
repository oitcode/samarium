<?php

namespace App\Livewire\Vendor\Dashboard;

use Livewire\Component;

class VendorEditPan extends Component
{
    public $vendor;

    public $pan_num;

    public function mount()
    {
        $this->pan_num = $this->vendor->pan_num;
    }

    public function render()
    {
        return view('livewire.vendor.dashboard.vendor-edit-pan');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'pan_num' => 'required',
        ]);

        $this->vendor->pan_num = $validatedData['pan_num'];
        $this->vendor->save();

        $this->dispatch('vendorUpdatePanCompleted');
    }
}

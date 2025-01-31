<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;

class CustomerEditPan extends Component
{
    public $customer;

    public $pan_num;

    public function mount()
    {
        $this->pan_num = $this->customer->pan_num;
    }

    public function render()
    {
        return view('livewire.customer.dashboard.customer-edit-pan');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'pan_num' => 'required',
        ]);

        $this->customer->pan_num = $validatedData['pan_num'];
        $this->customer->save();

        $this->dispatch('customerUpdatePanCompleted');
    }
}

<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;

class CustomerEditPhone extends Component
{
    public $customer;

    public $phone;

    public function mount()
    {
        $this->phone = $this->customer->phone;
    }

    public function render()
    {
        return view('livewire.customer.dashboard.customer-edit-phone');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'phone' => 'required',
        ]);

        $this->customer->phone = $validatedData['phone'];
        $this->customer->save();

        $this->dispatch('customerUpdatePhoneCompleted');
    }
}

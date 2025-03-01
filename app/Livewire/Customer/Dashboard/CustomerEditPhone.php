<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class CustomerEditPhone extends Component
{
    public $customer;

    public $phone;

    public function mount(): void
    {
        $this->phone = $this->customer->phone;
    }

    public function render(): View
    {
        return view('livewire.customer.dashboard.customer-edit-phone');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'phone' => 'required',
        ]);

        $this->customer->phone = $validatedData['phone'];
        $this->customer->save();

        $this->dispatch('customerUpdatePhoneCompleted');
    }
}

<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;

class CustomerEditEmail extends Component
{
    public $customer;

    public $email;

    public function mount()
    {
        $this->email = $this->customer->email;
    }

    public function render()
    {
        return view('livewire.customer.dashboard.customer-edit-email');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'email' => 'required',
        ]);

        $this->customer->email = $validatedData['email'];
        $this->customer->save();

        $this->dispatch('customerUpdateEmailCompleted');
    }
}

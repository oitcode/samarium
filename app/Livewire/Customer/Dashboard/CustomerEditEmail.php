<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class CustomerEditEmail extends Component
{
    public $customer;

    public $email;

    public function mount(): void
    {
        $this->email = $this->customer->email;
    }

    public function render(): View
    {
        return view('livewire.customer.dashboard.customer-edit-email');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'email' => 'required',
        ]);

        $this->customer->email = $validatedData['email'];
        $this->customer->save();

        $this->dispatch('customerUpdateEmailCompleted');
    }
}

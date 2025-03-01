<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class CustomerEditName extends Component
{
    public $customer;

    public $name;

    public function mount(): void
    {
        $this->name = $this->customer->name;
    }

    public function render(): View
    {
        return view('livewire.customer.dashboard.customer-edit-name');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->customer->name = $validatedData['name'];
        $this->customer->save();

        $this->dispatch('customerUpdateNameCompleted');
    }
}

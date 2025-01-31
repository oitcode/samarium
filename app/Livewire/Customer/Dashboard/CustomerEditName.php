<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;

class CustomerEditName extends Component
{
    public $customer;

    public $name;

    public function mount()
    {
        $this->name = $this->customer->name;
    }

    public function render()
    {
        return view('livewire.customer.dashboard.customer-edit-name');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        $this->customer->name = $validatedData['name'];
        $this->customer->save();

        $this->dispatch('customerUpdateNameCompleted');
    }
}

<?php

namespace App\Livewire\Customer\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class CustomerEditPan extends Component
{
    public $customer;

    public $pan_num;

    public function mount(): void
    {
        $this->pan_num = $this->customer->pan_num;
    }

    public function render(): View
    {
        return view('livewire.customer.dashboard.customer-edit-pan');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'pan_num' => 'required',
        ]);

        $this->customer->pan_num = $validatedData['pan_num'];
        $this->customer->save();

        $this->dispatch('customerUpdatePanCompleted');
    }
}

<?php

namespace App\Livewire\Misc;

use Livewire\Component;
use Illuminate\View\View;
use Carbon\Carbon;

class TransactionsNavigator extends Component
{
    public $daybookDate;

    public function mount(): void
    {
        $this->daybookDate = date('Y-m-d');
    }

    public function render(): View
    {
        return view('livewire.misc.transactions-navigator');
    }

    public function setPreviousDay(): void
    {
        $this->daybookDate = Carbon::create($this->daybookDate)->subDay()->toDateString();
        $this->dispatch('changeDate', $this->daybookDate);
    }

    public function setNextDay(): void
    {
        $this->daybookDate = Carbon::create($this->daybookDate)->addDay()->toDateString();
        $this->dispatch('changeDate', $this->daybookDate);
    }

    public function setTransactionsDate(): void
    {
        $validatedData = $this->validate([
            'daybookDate' => 'required|date',
        ]);

        $this->daybookDate = $validatedData['daybookDate'];
        $this->dispatch('changeDate', $this->daybookDate);
    }
}

<?php

namespace App\Livewire\Misc;

use Livewire\Component;
use Carbon\Carbon;

class TransactionsNavigator extends Component
{
    public $daybookDate;

    public function mount()
    {
        $this->daybookDate = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.misc.transactions-navigator');
    }

    public function setPreviousDay()
    {
        $this->daybookDate = Carbon::create($this->daybookDate)->subDay()->toDateString();
        $this->dispatch('changeDate', $this->daybookDate);
    }

    public function setNextDay()
    {
        $this->daybookDate = Carbon::create($this->daybookDate)->addDay()->toDateString();
        $this->dispatch('changeDate', $this->daybookDate);
    }

    public function setTransactionsDate()
    {
        $validatedData = $this->validate([
            'daybookDate' => 'required|date',
        ]);

        $this->daybookDate = $validatedData['daybookDate'];
        $this->dispatch('changeDate', $this->daybookDate);
    }
}

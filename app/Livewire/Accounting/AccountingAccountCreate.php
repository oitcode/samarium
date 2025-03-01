<?php

namespace App\Livewire\Accounting;

use Livewire\Component;
use Illuminate\View\View;
use App\AbAccount;
use App\AbAccountType;

class AccountingAccountCreate extends Component
{
    public string $name;
    public int $ab_account_type_id;
    public string $increase_type;
    public $abAccountTypes;

    public function render(): View
    {
        $this->abAccountTypes = AbAccountType::all();

        return view('livewire.accounting.accounting-account-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'ab_account_type_id' => 'required|integer',
            'increase_type' => 'required',
        ]);

        AbAccount::create($validatedData);

        $this->dispatch('abAccountAdded');
    }
}

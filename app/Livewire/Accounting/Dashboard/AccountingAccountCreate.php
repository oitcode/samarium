<?php

namespace App\Livewire\Accounting\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use App\Models\Accounting\AbAccount;
use App\Models\Accounting\AbAccountType;

class AccountingAccountCreate extends Component
{
    public string $name;
    public int $ab_account_type_id;
    public string $increase_type;
    public Collection $abAccountTypes;

    public function render(): View
    {
        $this->abAccountTypes = AbAccountType::all();

        return view('livewire.accounting.dashboard.accounting-account-create');
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

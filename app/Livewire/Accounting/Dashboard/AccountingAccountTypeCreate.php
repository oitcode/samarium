<?php

namespace App\Livewire\Accounting\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\AbAccountType;

class AccountingAccountTypeCreate extends Component
{
    public $abAccountTypes;

    public $name;
    public $parent_ab_account_type_id;

    public function render(): View
    {
        $this->abAccountTypes = AbAccountType::all();

        return view('livewire.accounting.dashboard.accounting-account-type-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'parent_ab_account_type_id' => 'nullable|integer',
        ]);

        AbAccountType::create($validatedData);

        $this->dispatch('exitAccountTypeCreateMode');
    }
}

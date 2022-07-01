<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\AbAccountType;

class AccountingAccountTypeCreate extends Component
{
    public $abAccountTypes;

    public $name;
    public $parent_ab_account_type_id;

    public function render()
    {
        $this->abAccountTypes = AbAccountType::all();

        return view('livewire.accounting-account-type-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'parent_ab_account_type_id' => 'nullable|integer',
        ]);

        AbAccountType::create($validatedData);

        $this->emit('exitAccountTypeCreateMode');
    }
}

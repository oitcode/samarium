<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\AbAccount;

class AccountingAccountCreate extends Component
{
    public $name;
    public $parent_account_id;

    public $abAccounts;

    public function render()
    {
        $this->abAccounts = AbAccount::all();

        return view('livewire.accounting-account-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        AbAccount::create($validatedData);

        $this->emit('abAccountAdded');
    }
}

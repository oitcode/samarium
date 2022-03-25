<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccountingComponent extends Component
{
    public $modes = [
        'create' => false,
        'list' => true,
        'viewJournalEntry' => false,
    ];

    protected $listeners = [
        'abAccountAdded',
    ];

    public function render()
    {
        return view('livewire.accounting-component');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function abAccountAdded()
    {
        $this->exitMode('create');
    }
}

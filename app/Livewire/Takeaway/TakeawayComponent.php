<?php

namespace App\Livewire\Takeaway;

use Livewire\Component;
use App\Takeaway;

class TakeawayComponent extends Component
{
    public $displayingTakeaway = null;

    public $modes = [
        'create' => false,
        'list' => true,
        'display' => false,
        'search' => false,
    ];

    protected $listeners = [
        'displayTakeaway',
        'exitTakeawayWork',
    ];

    public function render()
    {
        return view('livewire.sale.takeaway-component');
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

    public function displayTakeaway($takeawayId)
    {
        $takeaway = Takeaway::find($takeawayId);

        $this->displayingTakeaway = $takeaway;
        $this->enterMode('display');
    }

    public function exitTakeawayWork()
    {
        $this->displayingTakeaway = null;

        $this->exitMode('create');
        $this->exitMode('display');
    }
}

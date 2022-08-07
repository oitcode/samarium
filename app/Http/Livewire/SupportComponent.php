<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Traits\ModesTrait;

class SupportComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
    ];

    public function render()
    {
        return view('livewire.support-component');
    }
}

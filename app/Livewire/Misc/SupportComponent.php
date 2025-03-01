<?php

namespace App\Livewire\Misc;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;

class SupportComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
    ];

    public function render(): View
    {
        return view('livewire.misc.support-component');
    }
}

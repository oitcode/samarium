<?php

namespace App\Livewire\Takeaway;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Takeaway\Takeaway;

class TakeawayComponent extends Component
{
    use ModesTrait;
    
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

    public function render(): View
    {
        return view('livewire.sale.takeaway-component');
    }

    public function displayTakeaway($takeawayId): void
    {
        $takeaway = Takeaway::find($takeawayId);

        $this->displayingTakeaway = $takeaway;
        $this->enterMode('display');
    }

    public function exitTakeawayWork(): void
    {
        $this->displayingTakeaway = null;

        $this->exitMode('create');
        $this->exitMode('display');
    }
}

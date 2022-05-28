<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Takeaway;

class TakeawayList extends Component
{
    public $takeaways;

    public $deletingTakeaway = null;

    public $todayTakeawayCount;
    public $totalTakeawayCount;

    public $modes = [
        'confirmDelete' => false,
    ];

    protected $listeners = [
        'exitConfirmTakeawayDelete',
        'takeawayDeleted' => 'ackTakeawayDeleted',
    ];

    public function render()
    {
        $this->takeaways = Takeaway::orderBy('takeaway_id', 'desc')->get();
        $this->totalTakeawayCount = Takeaway::count();
        $this->todayTakeawayCount = Takeaway::whereDate('created_at', date('Y-m-d'))->count();

        return view('livewire.takeaway-list');
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

    public function confirmDeleteTakeaway(Takeaway $takeaway)
    {
        $this->deletingTakeaway = $takeaway;

        $this->enterMode('confirmDelete');
    }

    public function exitConfirmTakeawayDelete()
    {
        $this->deletingTakeaway = null;
        $this->exitMode('confirmDelete');
    }

    public function ackTakeawayDeleted()
    {
        $this->render();
    }
}

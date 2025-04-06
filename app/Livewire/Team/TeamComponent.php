<?php

namespace App\Livewire\Team;

use Livewire\Component;
use Illuminate\View\View;
use App\Team;
use App\Traits\ModesTrait;

class TeamComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'createMode' => false,
        'listMode' => true,
        'displayMode' => false,
    ];

    protected $listeners = [
        'exitCreateMode',
        'teamCreated',
        'displayTeam',
    ];

    public $displayingTeam = null;

    public function render(): View
    {
        return view('livewire.team.team-component');
    }

    public function exitCreateMode(): void
    {
        $this->exitMode('createMode');
    }

    public function displayTeam(int $teamId): void
    {
        $this->displayingTeam = Team::find($teamId);
        $this->enterMode('displayMode');
    }

    public function teamCreated(): void
    {
        session()->flash('message', 'Team created');
        $this->exitMode('createMode');
    }
}

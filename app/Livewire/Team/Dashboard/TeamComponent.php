<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Team\Team;

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
        return view('livewire.team.dashboard.team-component');
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

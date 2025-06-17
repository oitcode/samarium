<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Models\Team\Team;

class TeamUpdate extends Component
{
    use WithFileUploads;

    public $team;

    public $name;
    public $comment;
    public $team_type;
    public $image;

    public function mount()
    {
        $this->name = $this->team->name;
        $this->comment = $this->team->comment;
        $this->team_type = $this->team->team_type;
    }

    public function render(): View
    {
        return view('livewire.team.dashboard.team-update');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'comment' => 'nullable',
            'team_type' => 'nullable',
            'image' => 'nullable|image',
        ]);

        if ($this->image) {
            $imagePath = $this->image->store('teams', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $this->team->update($validatedData);

        $this->dispatch('teamUpdated');
    }
}

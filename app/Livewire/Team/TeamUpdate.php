<?php

namespace App\Livewire\Team;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Team;

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

    public function render()
    {
        return view('livewire.team.team-update');
    }

    public function update()
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

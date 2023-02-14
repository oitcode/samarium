<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\TeamMember;

class TeamDisplayTeamMemberCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $phone;
    public $email;
    public $comment;
    public $image;

    public $team;

    public function render()
    {
        return view('livewire.team.team-display-team-member-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable',
            'comment' => 'nullable',
            'image' => 'image|nullable',
        ]);

        $validatedData['team_id'] = $this->team->team_id;

        if ($this->image) {
            $imagePath = $this->image->store('teams', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        TeamMember::create($validatedData);

        $this->emit('teamMemberCreated');
    }
}

<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\TeamMember;

class TeamDisplayTeamMemberUpdate extends Component
{
    use WithFileUploads;

    public $teamMember;

    public $name;
    public $phone;
    public $email;
    public $comment;
    public $image;

    public function mount()
    {
        $this->name = $this->teamMember->name;
        $this->phone = $this->teamMember->phone;
        $this->email = $this->teamMember->email;
        $this->comment = $this->teamMember->comment;
    }

    public function render()
    {
        return view('livewire.team.team-display-team-member-update');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'nullable',
            'comment' => 'nullable',
            'image' => 'image|nullable',
        ]);

        if ($this->image) {
            $imagePath = $this->image->store('teams', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $this->teamMember->update($validatedData);

        $this->emit('teamMemberUpdated');
    }
}

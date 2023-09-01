<?php

namespace App\Http\Livewire\Team\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;

class TeamMemberEditPicture extends Component
{
    use WithFileUploads;

    public $teamMember;

    public $image;

    public function render()
    {
        return view('livewire.team.dashboard.team-member-edit-picture');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'image' => 'required|image',
        ]);

        $imagePath = $this->image->store('teamMembers', 'public');
        $validatedData['image_path'] = $imagePath;

        $this->teamMember->image_path = $validatedData['image_path'];
        $this->teamMember->save();

        $this->emit('teamMemberUpdatePictureCompleted');
    }
}

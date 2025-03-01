<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;

class TeamMemberEditPicture extends Component
{
    use WithFileUploads;

    public $teamMember;

    public $image;

    public function render(): View
    {
        return view('livewire.team.dashboard.team-member-edit-picture');
    }

    public function update(): void
    {
        $validatedData = $this->validate([
            'image' => 'required|image',
        ]);

        $imagePath = $this->image->store('teamMembers', 'public');
        $validatedData['image_path'] = $imagePath;

        $this->teamMember->image_path = $validatedData['image_path'];
        $this->teamMember->save();

        $this->dispatch('teamMemberUpdatePictureCompleted');
    }
}

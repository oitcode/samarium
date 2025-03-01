<?php

namespace App\Livewire\Team;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\ModesTrait;
use App\TeamMember;

class TeamDisplayTeamMemberUpdate extends Component
{
    use WithFileUploads;
    use ModesTrait;

    public $teamMember;

    public $name;
    public $phone;
    public $email;
    public $comment;
    public $image;

    public $modes = [
        'editNameMode' => false,
        'editPhoneMode' => false,
        'editEmailMode' => false,
        'editPictureMode' => false,
    ];

    protected $listeners = [
        'teamMemberUpdateNameCancelled',
        'teamMemberUpdateNameCompleted',

        'teamMemberUpdatePhoneCancelled',
        'teamMemberUpdatePhoneCompleted',

        'teamMemberUpdateEmailCancelled',
        'teamMemberUpdateEmailCompleted',

        'teamMemberUpdatePictureCancelled',
        'teamMemberUpdatePictureCompleted',
    ];

    public function mount(): void
    {
        $this->name = $this->teamMember->name;
        $this->phone = $this->teamMember->phone;
        $this->email = $this->teamMember->email;
        $this->comment = $this->teamMember->comment;
    }

    public function render(): View
    {
        return view('livewire.team.team-display-team-member-update');
    }

    public function update(): void
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

        $this->dispatch('teamMemberUpdated');
    }

    public function teamMemberUpdateNameCancelled(): void
    {
        $this->exitMode('editNameMode');
    }

    public function teamMemberUpdateNameCompleted(): void
    {
        $this->exitMode('editNameMode');
    }

    public function teamMemberUpdatePhoneCancelled(): void
    {
        $this->exitMode('editPhoneMode');
    }

    public function teamMemberUpdatePhoneCompleted(): void
    {
        $this->exitMode('editPhoneMode');
    }

    public function teamMemberUpdateEmailCancelled(): void
    {
        $this->exitMode('editEmailMode');
    }

    public function teamMemberUpdateEmailCompleted(): void
    {
        $this->exitMode('editEmailMode');
    }

    public function teamMemberUpdatePictureCancelled(): void
    {
        $this->exitMode('editPictureMode');
    }

    public function teamMemberUpdatePictureCompleted(): void
    {
        $this->exitMode('editPictureMode');
    }
}

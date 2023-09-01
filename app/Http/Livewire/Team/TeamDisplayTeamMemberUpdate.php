<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
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

    public function teamMemberUpdateNameCancelled()
    {
        $this->exitMode('editNameMode');
    }

    public function teamMemberUpdateNameCompleted()
    {
        $this->exitMode('editNameMode');
    }

    public function teamMemberUpdatePhoneCancelled()
    {
        $this->exitMode('editPhoneMode');
    }

    public function teamMemberUpdatePhoneCompleted()
    {
        $this->exitMode('editPhoneMode');
    }

    public function teamMemberUpdateEmailCancelled()
    {
        $this->exitMode('editEmailMode');
    }

    public function teamMemberUpdateEmailCompleted()
    {
        $this->exitMode('editEmailMode');
    }

    public function teamMemberUpdatePictureCancelled()
    {
        $this->exitMode('editPictureMode');
    }

    public function teamMemberUpdatePictureCompleted()
    {
        $this->exitMode('editPictureMode');
    }
}

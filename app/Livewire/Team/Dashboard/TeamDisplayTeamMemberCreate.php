<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\ModesTrait;
use App\Models\Team\TeamMember;
use App\GalleryImage;

class TeamDisplayTeamMemberCreate extends Component
{
    use WithFileUploads;
    use ModesTrait;

    public $name;
    public $phone;
    public $email;
    public $comment;
    public $image;

    public $team;
    public $position;

    public $selectedMediaImage;

    public $modes = [
        'selectImageFromNewUploadMode' => false,
        'selectImageFromLibraryMode' =>false,
        'mediaFromLibrarySelected' => false,
    ];

    protected $listeners = [
        'mediaImageSelected',
    ];

    public function render(): View
    {
        return view('livewire.team.dashboard.team-display-team-member-create');
    }

    public function store(): void
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

        if ($this->selectedMediaImage) {
            $validatedData['image_path'] = $this->selectedMediaImage->image_path;
        }

        /* Set the position in team */
        $maxPosition = $this->team->getMaxPosition();
        if ($maxPosition === null) {
            $validatedData['position'] = 0;
        } else {
            $validatedData['position'] = $maxPosition + 1;
        }

        TeamMember::create($validatedData);

        $this->dispatch('teamMemberCreated');
    }

    public function mediaImageSelected(GalleryImage $galleryImage): void
    {
        $this->selectedMediaImage = $galleryImage;
        $this->enterModeSilent('mediaFromLibrarySelected');
    }
}

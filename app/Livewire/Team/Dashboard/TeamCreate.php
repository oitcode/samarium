<?php

namespace App\Livewire\Team\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\ModesTrait;
use App\Models\Team\Team;
use App\GalleryImage;

class TeamCreate extends Component
{
    use WithFileUploads;
    use ModesTrait;

    public $name;
    public $comment;
    public $team_type;
    public $image;

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
        return view('livewire.team.dashboard.team-create');
    }

    public function store(): void
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

        if ($this->selectedMediaImage) {
            $validatedData['image_path'] = $this->selectedMediaImage->image_path;
        }

        Team::create($validatedData);

        $this->dispatch('teamCreated');
    }

    public function mediaImageSelected(GalleryImage $galleryImage): void
    {
        $this->selectedMediaImage = $galleryImage;
        $this->enterModeSilent('mediaFromLibrarySelected');
    }
}

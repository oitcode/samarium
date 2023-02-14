<?php

namespace App\Http\Livewire\Team;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Team;

class TeamCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $comment;
    public $image;

    public function render()
    {
        return view('livewire.team.team-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'comment' => 'nullable',
            'image' => 'nullable|image',
        ]);

        if ($this->image) {
            $imagePath = $this->image->store('teams', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        Team::create($validatedData);

        $this->emit('teamCreated');
    }
}

<?php

namespace App\Http\Livewire\Ecs;

use Livewire\Component;

use App\Webpage;

class WebpageCreate extends Component
{
    public $name;
    public $permalink;
    public $is_post = 'no';

    public function render()
    {
        return view('livewire.ecs.webpage-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'is_post' => 'required',
            'permalink' => 'required',
        ]);

        Webpage::create($validatedData);

        $this->emit('webpageAdded');
    }
}

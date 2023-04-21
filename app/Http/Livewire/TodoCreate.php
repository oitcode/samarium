<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Todo;

class TodoCreate extends Component
{
    public $title;
    public $description;

    public function render()
    {
        return view('livewire.todo-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required|string|max:254',
            'description' => 'string|max:254|nullable',
        ]);

        $validatedData['status'] = 'pending';
        $validatedData['creator_id'] = Auth::user()->id;

        Todo::create($validatedData);

        $this->emit('todoCreated');
    }
}

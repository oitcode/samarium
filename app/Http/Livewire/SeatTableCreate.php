<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\SeatTable;

class SeatTableCreate extends Component
{
    public $name;
    public $image;

    public function render()
    {
        return view('livewire.seat-table-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ]);

        SeatTable::create($validatedData);

        $this->emit('seatTableCreateCompleted');
    }
}

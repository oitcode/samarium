<?php

namespace App\Livewire\CafeSale;

use Livewire\Component;
use App\SeatTable;

class SeatTableCreate extends Component
{
    public $name;
    public $image;

    public function render()
    {
        return view('livewire.cafe-sale.seat-table-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ]);

        SeatTable::create($validatedData);

        $this->dispatch('seatTableCreateCompleted');
    }
}

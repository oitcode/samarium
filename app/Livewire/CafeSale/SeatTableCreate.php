<?php

namespace App\Livewire\CafeSale;

use Livewire\Component;
use Illuminate\View\View;
use App\SeatTable;

class SeatTableCreate extends Component
{
    public $name;
    public $image;

    public function render(): View
    {
        return view('livewire.cafe-sale.seat-table-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => 'nullable|image',
        ]);

        SeatTable::create($validatedData);

        $this->dispatch('seatTableCreateCompleted');
    }
}

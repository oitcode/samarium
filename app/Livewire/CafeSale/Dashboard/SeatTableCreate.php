<?php

namespace App\Livewire\CafeSale\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\SeatTable\SeatTable;

class SeatTableCreate extends Component
{
    public string $name;
    public $image;

    public function render(): View
    {
        return view('livewire.cafe-sale.dashboard.seat-table-create');
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

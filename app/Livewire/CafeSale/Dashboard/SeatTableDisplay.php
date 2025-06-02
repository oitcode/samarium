<?php

namespace App\Livewire\CafeSale\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class SeatTableDisplay extends Component
{
    public function render(): View
    {
        return view('livewire.cafe-sale.dashboard.seat-table-display');
    }
}

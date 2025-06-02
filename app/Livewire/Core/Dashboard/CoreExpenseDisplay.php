<?php

namespace App\Livewire\Core\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class CoreExpenseDisplay extends Component
{
    public $expense;

    public $display_toolbar = true;

    public $modes = [
        'showPayments' => false,
    ];

    public function render(): View
    {
        return view('livewire.core.dashboard.core-expense-display');
    }
}

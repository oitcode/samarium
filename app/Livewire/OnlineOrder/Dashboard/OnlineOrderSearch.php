<?php

namespace App\Livewire\OnlineOrder\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\OnlineOrder;

class OnlineOrderSearch extends Component
{
    public $onlineOrders;

    public function render(): View
    {
        return view('livewire.online-order.dashboard.online-order-search');
    }

    public function search(): void
    {
        // Todo
    }
}

<?php

namespace App\Http\Livewire\OnlineOrder\Dashboard;

use Livewire\Component;

use App\OnlineOrder;

class OnlineOrderSearch extends Component
{
    public $onlineOrders;

    public function render()
    {
        return view('livewire.online-order.dashboard.online-order-search');
    }

    public function search()
    {
        // Todo
    }
}

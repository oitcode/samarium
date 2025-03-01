<?php

namespace App\Livewire\OnlineOrder\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\WebsiteOrder;

class OnlineOrderCounter extends Component
{
    public $newOrderCount;

    public function render(): View
    {
        $newOrders = WebsiteOrder::where('status', 'new')->get();

        $this->newOrderCount = count($newOrders);

        return view('livewire.online-order.dashboard.online-order-counter');
    }
}

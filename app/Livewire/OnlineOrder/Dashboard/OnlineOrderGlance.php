<?php

namespace App\Livewire\OnlineOrder\Dashboard;

use Livewire\Component;
use App\WebsiteOrder;

class OnlineOrderGlance extends Component
{
    public $onlineOrderCount;
    public $newOnlineOrderCount;

    public function render()
    {
        $this->onlineOrderCount = WebsiteOrder::count();
        $this->newOnlineOrderCount = WebsiteOrder::where('status', 'new')->count();

        return view('livewire.online-order.dashboard.online-order-glance');
    }
}

<?php

namespace App\Livewire\OnlineOrder\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\WebsiteOrder\WebsiteOrder;

class OnlineOrderGlance extends Component
{
    public $onlineOrderCount;
    public $newOnlineOrderCount;

    public function render(): View
    {
        $this->onlineOrderCount = WebsiteOrder::count();
        $this->newOnlineOrderCount = WebsiteOrder::where('status', 'new')->count();

        return view('livewire.online-order.dashboard.online-order-glance');
    }
}

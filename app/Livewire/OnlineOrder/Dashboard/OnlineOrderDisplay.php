<?php

namespace App\Livewire\OnlineOrder\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class OnlineOrderDisplay extends Component
{
    public $websiteOrder;

    public function render(): View
    {
        return view('livewire.online-order.dashboard.online-order-display');
    }

    public function acceptOrder(): void
    {
        $this->websiteOrder->status = 'open';
        $this->websiteOrder->save();
        $this->render();
    }

    public function rejectOrder(): void
    {
        $this->websiteOrder->status = 'rejected';
        $this->websiteOrder->save();
        $this->render();
    }

    public function markAsDelivered(): void
    {
        $this->websiteOrder->status = 'delivered';
        $this->websiteOrder->save();
        $this->render();
    }
}

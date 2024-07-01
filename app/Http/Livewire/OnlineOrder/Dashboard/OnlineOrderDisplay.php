<?php

namespace App\Http\Livewire\OnlineOrder\Dashboard;

use Livewire\Component;

class OnlineOrderDisplay extends Component
{
    public $websiteOrder;

    public function render()
    {
        return view('livewire.online-order.dashboard.online-order-display');
    }

    public function acceptOrder()
    {
        $this->websiteOrder->status = 'open';
        $this->websiteOrder->save();
        $this->render();
    }

    public function rejectOrder()
    {
        $this->websiteOrder->status = 'rejected';
        $this->websiteOrder->save();
        $this->render();
    }

    public function markAsDelivered()
    {
        $this->websiteOrder->status = 'delivered';
        $this->websiteOrder->save();
        $this->render();
    }
}

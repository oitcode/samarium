<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\WebsiteOrder;

class OnlineOrderCounter extends Component
{
    public $newOrderCount;

    public function render()
    {
        $newOrders = WebsiteOrder::where('status', 'new')->get();

        $this->newOrderCount = count($newOrders);

        return view('livewire.online-order-counter');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\WebsiteOrder;

class OnlineOrderList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $onlineOrders = null;

    public $newOrderCount;
    public $todayOrderCount;
    public $totalOrderCount;

    public function render()
    {
        $websiteOrders = WebsiteOrder::orderBy('website_order_id', 'desc')->paginate(10);
        $this->setOrderCounts();

        return view('livewire.online-order-list')
            ->with('websiteOrders', $websiteOrders);
    }

    public function getNewOrderCount()
    {
        return count(WebsiteOrder::where('status', 'new')->get());
    }

    public function updateStatus(WebsiteOrder $order, $statusNow, $statusNext)
    {
        $order->status = $statusNext;
        $order->save();

        $this->render();
    }

    public function setOrderCounts()
    {
        $this->newOrderCount = count(WebsiteOrder::where('status', 'new')->get());
        $this->todayOrderCount = count(WebsiteOrder::whereDate('created_at', date('Y-m-d'))->get());
        $this->totalOrderCount = WebsiteOrder::count();
    }
}

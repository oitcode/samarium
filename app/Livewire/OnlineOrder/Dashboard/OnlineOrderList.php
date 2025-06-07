<?php

namespace App\Livewire\OnlineOrder\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Models\WebsiteOrder\WebsiteOrder;

class OnlineOrderList extends Component
{
    use ModesTrait;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $onlineOrders = null;

    public $newOrderCount;
    public $todayOrderCount;
    public $totalOrderCount;

    public $modes = [
        'showOnlyNewMode' => false,
        'showOnlyOpenMode' => false,
        'showOnlyDeliveredMode' => false,
        'showOnlyRejectedMode' => false,
        'showAllMode' => true,
    ];

    public function render(): View
    {
        $websiteOrders = WebsiteOrder::orderBy('website_order_id', 'desc')->paginate(5);
        $this->setOrderCounts();

        if ($this->modes['showAllMode']) {
            $websiteOrders = WebsiteOrder::orderBy('website_order_id', 'desc')->paginate(5);
        } else if ($this->modes['showOnlyNewMode']) {
            $websiteOrders = WebsiteOrder::where('status', 'new')->paginate(5);
        } else if ($this->modes['showOnlyOpenMode']) {
            $websiteOrders = WebsiteOrder::where('status', 'open')->paginate(5);
        } else if ($this->modes['showOnlyDeliveredMode']) {
            $websiteOrders = WebsiteOrder::where('status', 'delivered')->paginate(5);
        } else if ($this->modes['showOnlyRejectedMode']) {
            $websiteOrders = WebsiteOrder::where('status', 'rejected')->paginate(5);
        } else {
            // Todo
        }

        return view('livewire.online-order.dashboard.online-order-list')
            ->with('websiteOrders', $websiteOrders);
    }

    public function getNewOrderCount(): int
    {
        return count(WebsiteOrder::where('status', 'new')->get());
    }

    public function updateStatus(WebsiteOrder $order, $statusNow, $statusNext): void
    {
        $order->status = $statusNext;
        $order->save();

        $this->render();
    }

    public function setOrderCounts(): void
    {
        $this->newOrderCount = count(WebsiteOrder::where('status', 'new')->get());
        $this->todayOrderCount = count(WebsiteOrder::whereDate('created_at', date('Y-m-d'))->get());
        $this->totalOrderCount = WebsiteOrder::count();
    }
}

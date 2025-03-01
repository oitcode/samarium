<?php

namespace App\Livewire\OnlineOrder\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\WebsiteOrder;
use App\Traits\ModesTrait;

class OnlineOrderComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'onlineOrderDisplay' => false,
        'listMode' => true,
        'searchMode' => false,
    ];

    protected $listeners = [
        'displayOnlineOrder',
        'exitOnlineOrderDisplayMode',
    ];

    public $displayingOnlineOrder = null;

    public function render(): View
    {
        return view('livewire.online-order.dashboard.online-order-component');
    }

    public function displayOnlineOrder($onlineOrderId): void
    {
        $onlineOrder = WebsiteOrder::findOrFail($onlineOrderId);

        $this->displayingOnlineOrder = $onlineOrder;
        $this->enterMode('onlineOrderDisplay');
    }

    public function exitOnlineOrderDisplayMode(): void
    {
        $this->displayingSaleQuotation = null;
        $this->clearModes();
    }
}

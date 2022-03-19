<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\WebsiteOrder;

class OnlineOrderComponent extends Component
{
    public $modes = [
        'onlineOrderDisplay' => false,
    ];

    protected $listeners = [
        'displayOnlineOrder',
    ];

    public $displayingOnlineOrder = null;

    public function render()
    {
        return view('livewire.online-order-component');
    }

    /* Clear modes */
    public function clearModes()
    {
        foreach ($this->modes as $key => $val) {
            $this->modes[$key] = false;
        }
    }

    /* Enter and exit mode */
    public function enterMode($modeName)
    {
        $this->clearModes();

        $this->modes[$modeName] = true;
    }

    public function exitMode($modeName)
    {
        $this->modes[$modeName] = false;
    }

    public function displayOnlineOrder($onlineOrderId)
    {
        $onlineOrder = WebsiteOrder::findOrFail($onlineOrderId);

        $this->displayingOnlineOrder = $onlineOrder;
        $this->enterMode('onlineOrderDisplay');
    }
}

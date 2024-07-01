<?php

namespace App\Http\Livewire\Core;

use Livewire\Component;

class CorePurchaseList extends Component
{
    public $purchases;

    public $options = [
        'all' => 'false',
        'vendor' => 'false',
    ];

    public $vendor = null;

    public function render()
    {
        $this->fillPurchases();

        return view('livewire.core.core-purchase-list');
    }

    public function fillPurchases()
    {
        if ($this->vendor) {
            $this->purchases = $this->vendor->purchases()->orderBy('purchase_id', 'desc')->get();
        }
    }
}

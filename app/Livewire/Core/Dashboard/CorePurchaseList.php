<?php

namespace App\Livewire\Core\Dashboard;

use Livewire\Component;
use Illuminate\View\View;

class CorePurchaseList extends Component
{
    public $purchases;

    public $options = [
        'all' => 'false',
        'vendor' => 'false',
    ];

    public $vendor = null;

    public function render(): View
    {
        $this->fillPurchases();

        return view('livewire.core.dashboard.core-purchase-list');
    }

    public function fillPurchases(): void
    {
        if ($this->vendor) {
            $this->purchases = $this->vendor->purchases()->orderBy('purchase_id', 'desc')->get();
        }
    }
}

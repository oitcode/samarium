<?php

namespace App\Livewire\Purchase\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Purchase\Purchase;

class PurchaseSearch extends Component
{
    public $vendor_search_name;

    public $purchases;
    public $searchDone = false;

    public function render(): View
    {
        return view('livewire.purchase.dashboard.purchase-search');
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'vendor_search_name' => 'required',
        ]);

        $purchases = Purchase::whereHas('vendor', function ($query) use ($validatedData) {
            $query->where( 'name', 'like', '%'.$validatedData['vendor_search_name'].'%');
        })->orderBy('purchase_id', 'desc')->get();

        $this->purchases = $purchases;

        $this->searchDone = true;
    }

}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Purchase;

class PurchaseSearch extends Component
{
    public $vendor_search_name;

    public $purchases;

    public function render()
    {
        return view('livewire.purchase-search');
    }

    public function search()
    {
        $validatedData = $this->validate([
            'vendor_search_name' => 'required',
        ]);

        $purchases = Purchase::whereHas('vendor', function ($query) use ($validatedData) {
            $query->where( 'name', 'like', '%'.$validatedData['vendor_search_name'].'%');
        })->orderBy('purchase_id', 'desc')->get();

        $this->purchases = $purchases;
    }
}

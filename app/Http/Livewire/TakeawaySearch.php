<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Takeaway;

class TakeawaySearch extends Component
{
    public $customer_search_name;

    public $takeaways;

    public function render()
    {
        return view('livewire.takeaway-search');
    }

    public function search()
    {
        $validatedData = $this->validate([
            'customer_search_name' => 'required',
        ]);

        $takeaways = Takeaway::whereHas('saleInvoice', function ($query) use ($validatedData) {
            $query->whereHas( 'customer', function ($query) use ($validatedData) {
                $query->where( 'name', 'like', '%'.$validatedData['customer_search_name'].'%');
            });
        })->orderBy('takeaway_id', 'desc')->get();

        $this->takeaways = $takeaways;
    }
}

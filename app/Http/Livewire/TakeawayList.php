<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Takeaway;

class TakeawayList extends Component
{
    public $takeaways;

    public function render()
    {
        $this->takeaways = Takeaway::orderBy('takeaway_id', 'desc')->get();

        return view('livewire.takeaway-list');
    }
}

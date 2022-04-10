<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Webpage;

class WebpageList extends Component
{
    public function render()
    {
        $this->webpages = Webpage::all();

        return view('livewire.webpage-list');
    }
}

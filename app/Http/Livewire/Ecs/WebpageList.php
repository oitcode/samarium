<?php

namespace App\Http\Livewire\Ecs;

use Livewire\Component;

use App\Webpage;

class WebpageList extends Component
{
    public function render()
    {
        $this->webpages = Webpage::orderBy('webpage_id', 'DESC')->get();

        return view('livewire.ecs.webpage-list');
    }
}

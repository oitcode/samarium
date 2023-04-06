<?php

namespace App\Http\Livewire\Cms\Website;

use Livewire\Component;

class WebpageDisplay extends Component
{
    public $webpage;

    public function render()
    {
        return view('livewire.cms.website.webpage-display');
    }
}

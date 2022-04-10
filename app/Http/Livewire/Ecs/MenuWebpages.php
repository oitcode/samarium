<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Webpage;

class MenuWebpages extends Component
{
    public $webpages;

    public function render()
    {
        $this->webpages = Webpage::all();

        return view('livewire.menu-webpages');
    }
}

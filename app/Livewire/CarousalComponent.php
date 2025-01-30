<?php

namespace App\Livewire;

use Livewire\Component;
use App\Gallery;

class CarousalComponent extends Component
{
    public $gallery;

    public function render()
    {
        $this->gallery = Gallery::first();

        return view('livewire.carousal-component');
    }
}

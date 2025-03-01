<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Gallery;

class CarousalComponent extends Component
{
    public $gallery;

    public function render(): View
    {
        $this->gallery = Gallery::first();

        return view('livewire.carousal-component');
    }
}

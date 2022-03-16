<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WebsiteHomeSearchResult extends Component
{
    public $products;

    public function render()
    {
        return view('livewire.website-home-search-result');
    }
}

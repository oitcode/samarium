<?php

namespace App\Http\Livewire\UrlLink\Dashboard;

use Livewire\Component;

use App\UrlLink;

class UrlLinkList extends Component
{
    public $urlLinks;

    public $urlLinksCount;

    public function render()
    {
        $this->urlLinks = UrlLink::all();
        $this->urlLinksCount = UrlLink::count();

        return view('livewire.url-link.dashboard.url-link-list');
    }
}

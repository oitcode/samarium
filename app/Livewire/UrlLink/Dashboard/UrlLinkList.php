<?php

namespace App\Livewire\UrlLink\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\UrlLink;

class UrlLinkList extends Component
{
    use WithPagination;

    // public $urlLinks;

    public $urlLinksCount;

    public function render()
    {
        $urlLinks = UrlLink::orderBy('url_link_id', 'DESC')->paginate(5);
        $this->urlLinksCount = UrlLink::count();

        return view('livewire.url-link.dashboard.url-link-list')
            ->with('urlLinks', $urlLinks);
    }
}

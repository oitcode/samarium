<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\Webpage;

class WebpageList extends Component
{
    use WithPagination;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $webpages = Webpage::where('is_post', 'no')->orderBy('webpage_id', 'DESC')->paginate(10);

        return view('livewire.cms.dashboard.webpage-list')
            ->with('webpages', $webpages);
    }
}

<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;

use App\Traits\ModesTrait;

use App\Webpage;

class WebpageList extends Component
{
    use WithPagination;

    use ModesTrait;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    public $deletingWebpage;

    public $modes = [
        'delete' => false,
        'cannotDelete' => false,
    ];

    public function render()
    {
        $webpages = Webpage::where('is_post', 'no')->orderBy('webpage_id', 'DESC')->paginate(5);

        return view('livewire.cms.dashboard.webpage-list')
            ->with('webpages', $webpages);
    }

    public function deleteWebpage(Webpage $webpage)
    {
        $this->deletingWebpage = $webpage;

        $this->enterMode('delete');

        if (count($webpage->cmsNavMenuItems) > 0) {
            $this->enterModeSilent('cannotDelete');
        }
    }

    public function deleteWebpageCancel()
    {
        $this->deletingWebpage = null;
        $this->exitMode('delete');
    }

    public function confirmDeleteWebpage()
    {
        foreach ($this->deletingWebpage->webpageContents as $webpageContent) {
            $webpageContent->delete();
        }

        $this->deletingWebpage->delete();

        $this->exitMode('delete');
    }
}

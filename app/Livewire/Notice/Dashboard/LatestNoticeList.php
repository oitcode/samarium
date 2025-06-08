<?php

namespace App\Livewire\Notice\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Cms\Webpage\WebpageCategory;

class LatestNoticeList extends Component
{
    public $notices;

    public function render(): View
    {
        if (WebpageCategory::where('name', 'notice')->first()) {
            $this->notices = WebpageCategory::where('name', 'notice')->first()->webPages()
                ->where('visibility', 'public')
                ->orderBy('webpage_id', 'desc')->limit(3)->get();
        } else {
            $this->notices = null;
        }

        return view('livewire.notice.dashboard.latest-notice-list');
    }
}

<?php

namespace App\Http\Livewire\Notice\Dashboard;

use Livewire\Component;

use App\WebpageCategory;

class LatestNoticeList extends Component
{
    public $notices;

    public function render()
    {
        $this->notices = WebpageCategory::where('name', 'notice')->first()->webPages()->limit(5)->get();

        return view('livewire.notice.dashboard.latest-notice-list');
    }
}

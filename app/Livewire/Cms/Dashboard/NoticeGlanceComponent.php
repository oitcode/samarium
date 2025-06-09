<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Cms\Webpage\Webpage;
use App\Models\Cms\Webpage\WebpageCategory;

class NoticeGlanceComponent extends Component
{
    public $noticeCount;
    public $todayNoticeCount;

    public function render(): View
    {
        $this->noticeCount = $this->getTotalNoticeCount();
        $this->todayNoticeCount = $this->getTodayNoticeCount();

        return view('livewire.cms.dashboard.notice-glance-component');
    }

    public function getTotalNoticeCount(): int
    {
        $total = 0;

        $noticeCategory = WebpageCategory::where('name', 'notice')->first();

        if ($noticeCategory) {
            $total = count($noticeCategory->webPages()->where('is_post', 'yes')->get());
        }

        return $total;
    }

    public function getTodayNoticeCount(): int
    {
        $total = 0;

        $noticeCategory = WebpageCategory::where('name', 'notice')->first();

        if ($noticeCategory) {
            $total = count($noticeCategory->webPages()->where('is_post', 'yes')->whereDate('webpage.created_at', '=', date('Y-m-d'))->get());
        }

        return $total;
    }
}

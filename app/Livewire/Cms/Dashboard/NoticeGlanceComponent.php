<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\Webpage;
use App\WebpageCategory;

class NoticeGlanceComponent extends Component
{
    public $noticeCount;
    public $todayNoticeCount;

    public function render()
    {
        $this->noticeCount = $this->getTotalNoticeCount();
        $this->todayNoticeCount = $this->getTodayNoticeCount();

        return view('livewire.cms.dashboard.notice-glance-component');
    }

    public function getTotalNoticeCount()
    {
        $total = 0;

        $noticeCategory = WebpageCategory::where('name', 'notice')->first();

        if ($noticeCategory) {
            $total = count($noticeCategory->webPages()->where('is_post', 'yes')->get());
        }

        return $total;
    }

    public function getTodayNoticeCount()
    {
        $total = 0;

        $noticeCategory = WebpageCategory::where('name', 'notice')->first();

        if ($noticeCategory) {
            $total = count($noticeCategory->webPages()->where('is_post', 'yes')->whereDate('webpage.created_at', '=', date('Y-m-d'))->get());
        }

        return $total;
    }
}

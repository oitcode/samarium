<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Webpage;

class WebpageDisplay extends Component
{
    public Webpage $webpage;
    public bool $isSpecialWebpage;

    public function render(): View
    {
        $this->webpage->website_views = $this->webpage->website_views + 1;
        $this->webpage->save();

        $this->checkIfWebpageIsSpecial();

        return view('livewire.cms.website.webpage-display');
    }

    public function checkIfWebpageIsSpecial(): void
    {
        if (
                $this->webpage->webpageCategoriesPostpage()->count() > 0 ||
                $this->webpage->webpageTeams()->count() > 0 ||
                $this->webpage->webpageProductCategories()->count() > 0 ||
                $this->webpage->name == 'Gallery' ||
                $this->webpage->name == 'Downloads' ||
                $this->webpage->name == 'Products' ||
                $this->webpage->name == 'News' ||
                $this->webpage->name == 'Post' ||
                $this->webpage->name == 'What we did' ||
                $this->webpage->name == 'What we did' ||
                $this->webpage->name == 'Notice' ||
                $this->webpage->name == 'Noticeboard' ||
                $this->webpage->permalink == '/notice' ||
                $this->webpage->name == 'Teams' ||
                $this->webpage->name == 'Sponsors' ||
                $this->webpage->name == 'Organizing Committee' ||
                $this->webpage->name == 'Committee' ||
                $this->webpage->name == 'Contact us' ||
                $this->webpage->permalink == '/contact-us' ||
                $this->webpage->name == 'Calendar' ||
                $this->webpage->permalink == '/calendar' ||
                $this->webpage->name == 'Careers' ||
                $this->webpage->name == 'Fixtures'
           ) {
            $this->isSpecialWebpage = true;
        } else {
            $this->isSpecialWebpage = false;
        }
    }
}

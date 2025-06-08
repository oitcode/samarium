<?php

namespace App\Livewire\Webpage\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Cms\Webpage\Webpage;

class WebpageSearch extends Component
{
    public $webpage_search_name;

    public $webpages;
    public $searchDone = false;

    public function render(): View
    {
        return view('livewire.webpage.dashboard.webpage-search');
    }

    public function search(): void
    {
        $validatedData = $this->validate([
            'webpage_search_name' => 'required',
        ]);

        $webpages = Webpage::where('is_post', '!=', 'yes')->where('name', 'like', '%'.$validatedData['webpage_search_name'].'%')->get();

        $this->webpages = $webpages;
        $this->searchDone = true;
    }
}

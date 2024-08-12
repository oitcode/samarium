<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\WebpageCategory;
use App\WebpageWebpageCategory;

class WebpageEditWebpageCategory extends Component
{
    public $webpage;

    public $webpageCategories;

    public $webpage_category_id;

    public function render()
    {
        $this->webpageCategories = WebpageCategory::all();

        return view('livewire.cms.dashboard.webpage-edit-webpage-category');
    }

    public function addWebpageCategoryToWebpage()
    {
        $validatedData = $this->validate([
            'webpage_category_id' => 'required',
        ]);

        $validatedData['webpage_id'] = $this->webpage->webpage_id;

        WebpageWebpageCategory::create($validatedData);

        $this->dispatch('webpageEditWebpageCategoryCompleted');
    }
}

<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\WebpageCategory;
use App\WebpageWebpageCategory;

class WebpageAddWebpageCategory extends Component
{
    public $webpage;

    public $webpageCategories;

    public $webpage_category_id;

    public function render(): View
    {
        $this->webpageCategories = WebpageCategory::all();

        return view('livewire.cms.dashboard.webpage-add-webpage-category');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'webpage_category_id' => 'required',
        ]);

        $validatedData['webpage_id'] = $this->webpage->webpage_id;

        WebpageWebpageCategory::create($validatedData);

        $this->dispatch('webpageEditWebpageCategoryCompleted');
    }
}

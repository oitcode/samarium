<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\WebpageCategory;

class PostCategoryCreate extends Component
{
    public $name;

    public function render(): View
    {
        return view('livewire.cms.dashboard.post-category-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        WebpageCategory::create($validatedData);

        $this->dispatch('createPostCategoryCompleted');
    }
}

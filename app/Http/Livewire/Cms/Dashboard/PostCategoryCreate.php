<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

use App\WebpageCategory;

class PostCategoryCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.cms.dashboard.post-category-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
        ]);

        WebpageCategory::create($validatedData);

        $this->emit('createPostCategoryCompleted');
    }
}

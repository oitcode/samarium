<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Webpage;

class WebpageCreate extends Component
{
    public $name;
    public $permalink;
    public $is_post = 'no';

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|unique:webpage,name',
            'is_post' => 'required',
        ]);

        if ($validatedData['is_post'] == 'yes') {
            $validatedData['permalink'] = '/posts/' . date('Y-m-d') . '/' . rand(10000, 99999);
        } else {
            $validatedData += $this->validate([
                'permalink' => 'required|unique:webpage,permalink',
            ]);
        }

        $validatedData['creator_id'] = Auth::id();
        $validatedData['visibility'] = 'public';

        $webpage = Webpage::create($validatedData);

        $this->dispatch('webpageAdded', $webpage->webpage_id);
    }
}

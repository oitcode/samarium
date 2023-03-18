<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;

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
            'name' => 'required',
            'is_post' => 'required',
        ]);

        if ($validatedData['is_post'] == 'yes') {
            $validatedData['permalink'] = '/posts/' . date('Y-m-d') . '/' . rand(10000, 99999);
        } else {
            $validatedData += $this->validate([
                'permalink' => 'required|unique:webpage,permalink',
            ]);
        }

        Webpage::create($validatedData);

        $this->emit('webpageAdded');
    }
}

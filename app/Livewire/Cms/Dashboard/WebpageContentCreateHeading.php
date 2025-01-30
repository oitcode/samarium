<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use App\WebpageContent;

class WebpageContentCreateHeading extends Component
{
    public $webpage;

    public $heading;

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-content-create-heading');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'heading' => 'required',
        ]);

        /* Prepare the content */
        $content = '<h1>' . $validatedData['heading'] . '</h1>';

        $webpageContent = new WebpageContent;

        $webpageContent->webpage_id = $this->webpage->webpage_id;
        $webpageContent->position = $this->webpage->getHighestContentPosition() + 1;
        $webpageContent->body = $content;
        $webpageContent->save();

        $this->dispatch('webpageContentCreateHeadingCompleted');
    }
}

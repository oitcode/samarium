<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use App\WebpageContent;

class WebpageContentCreateParagraph extends Component
{
    public $webpage;

    public $paragraph;

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-content-create-paragraph');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'paragraph' => 'required',
        ]);

        /* Prepare the content */
        $content = '<p class="m-0 p-0">' . $validatedData['paragraph'] . '</p>';

        $webpageContent = new WebpageContent;

        $webpageContent->webpage_id = $this->webpage->webpage_id;
        $webpageContent->position = $this->webpage->getHighestContentPosition() + 1;
        $webpageContent->body = $content;
        $webpageContent->save();

        $this->dispatch('webpageContentCreateParagraphCompleted');
    }
}

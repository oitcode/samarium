<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Cms\Webpage\WebpageContent;

class WebpageContentCreateParagraph extends Component
{
    public $webpage;

    public $paragraph;

    public function render(): View
    {
        return view('livewire.cms.dashboard.webpage-content-create-paragraph');
    }

    public function store(): void
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

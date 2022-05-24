<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\WebpageContent;

class WebpageDisplayWebpageContentCreate extends Component
{
    use WithFileUploads;

    public $webpage;

    public $position;
    public $content_type;
    public $content;
    public $image;

    public function render()
    {
        return view('livewire.cms.webpage-display-webpage-content-create');
    }

    public function store()
    {
        $this->position = $this->getHighestPosition() + 1;

        if ($this->content_type == 'heading') {
            $this->createHeading();
        } else if ($this->content_type == 'paragraph') {
            $this->createParagraph();
        } else if ($this->content_type == 'image') {
            $this->createImage();
        } else if ($this->content_type == 'image_and_paragraph') {
            $this->createImageAndParagraph();
        } else {
          dd($this->content_type) ;
          dd('What the cms...') ;
        }

        $this->emit('webpageContentAdded');
    }

    public function createHeading()
    {
        $webpageContent = new WebpageContent;

        $webpageContent->webpage_id = $this->webpage->webpage_id;
        $webpageContent->position = $this->position;
        $webpageContent->webpage_content_type = 'heading';
        $webpageContent->content= '<h2>' . $this->content . '</h2>';

        $webpageContent->save();
    }

    public function createParagraph()
    {
        $webpageContent = new WebpageContent;

        $webpageContent->webpage_id = $this->webpage->webpage_id;
        $webpageContent->position = $this->position;
        $webpageContent->webpage_content_type = 'paragraph';
        $webpageContent->content= '<p>' . $this->content . '</p>';

        $webpageContent->save();
    }

    public function createImage()
    {
        $webpageContent = new WebpageContent;

        $webpageContent->webpage_id = $this->webpage->webpage_id;
        $webpageContent->position = $this->position;
        $webpageContent->webpage_content_type = 'image';

        if ($this->image) {
            $imagePath = $this->image->store('webpageImages', 'public');
        }

        $webpageContent->content = $imagePath;

        $webpageContent->save();
    }

    public function createImageAndParagraph()
    {
        //
    }

    public function getHighestPosition()
    {
        $position = 0;

        foreach ($this->webpage->webpageContents as $webPageContent) {
            $position++;
        }

        return $position;
    }
}

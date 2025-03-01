<?php

namespace App\Livewire\Cms\Dashboard\WebpageContentCreate;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithFileUploads;
use App\Traits\ModesTrait;
use App\WebpageContent;

class Row extends Component
{
    use WithFileUploads;
    use ModesTrait;

    public $webpage;

    /* This will hold the contents of columns. */
    public $contents = array();

    public $numOfRows = 3;

    public function mount(): void
    {
        for ($i = 0; $i < $this->numOfRows; $i++) {
            $this->contents[] = [
                'image' => '',
                'heading' => '',
                'paragraph' => '',
            ];
        }
    }

    public function render(): View
    {
        return view('livewire.cms.dashboard.webpage-content-create.row');
    }

    public function store(): void
    {
        /* Todo: Validation */
        // $validatedData = $this->validate([
        // ]);

        /* Prepare the content */
        $content = $this->prepareContent();

        $webpageContent = new WebpageContent;

        $webpageContent->webpage_id = $this->webpage->webpage_id;
        $webpageContent->position = $this->webpage->getHighestContentPosition() + 1;
        $webpageContent->body = $content;
        $webpageContent->save();

        $this->dispatch('webpageContentCreateRowCompleted');
    }

    /* Prepare the content */
    public function prepareContent(): string
    {

        $content = '<div class="row">';

        for ($i = 0; $i < $this->numOfRows; $i++) {

            /* Save the image */
            $imagePath = $this->contents[$i]['image']->store('webpageContent', 'public');

            /* Prepare the content html */
            $content = $content . '
                <div class="col-md-4">
                  <div>
                    <div>
                      <img src="' . asset('storage/' . $imagePath) . '" class="img-fluid">
                    </div>
                    <h2>'
                      . $this->contents[$i]['heading'] .
                    '</h2>
                    <p>'
                      . $this->contents[$i]['paragraph'] .
                    '</p>
                  </div>
                </div>
            ';
        }

        $content = $content . '</div>';

        return $content;
    }
}

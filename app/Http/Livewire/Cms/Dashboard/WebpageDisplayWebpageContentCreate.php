<?php

namespace App\Http\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

use App\Traits\ModesTrait;

use App\WebpageContent;

class WebpageDisplayWebpageContentCreate extends Component
{
    use WithFileUploads;
    use ModesTrait;

    public $webpage;

    public $position;
    public $title;
    public $body; 
    /* public $value; */
    public $image;
    public $video_link;

    public $modes = [
        'headingMode' => false,
        'imageMode' => false,
        'paragraphMode' => false,
        'mediaAndTextMode' => false,
        'galleryMode' => false,

        'rowMode' => false,
    ];

    protected $listeners = [
        'webpageContentCreateHeadingCompleted' => 'webpageContentCreatedCompleted',
        'webpageContentCreateParagraphCompleted' => 'webpageContentCreatedCompleted',
        'webpageContentCreateMediaAndTextCompleted' => 'webpageContentCreatedCompleted',
        'webpageContentCreateImageCompleted' => 'webpageContentCreatedCompleted',
    ];

    public function render()
    {
        return view('livewire.cms.dashboard.webpage-display-webpage-content-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'nullable',
            'body' => 'nullable', 
            /* 'value' => 'nullable', */
            'image' => 'nullable|image',
            'video_link' => 'nullable',
        ]);

        /* dd ($validatedData['body']);  */

        $validatedData['position'] = $this->getHighestPosition();

        if ($this->image) {
            $image_path = $this->image->store('webpage-content', 'public');
            $validatedData['image_path'] = $image_path;
        }

        $validatedData['webpage_id'] = $this->webpage->webpage_id;

        /* $validatedData['body'] = $validatedData['value']; */

        //DB::beginTransaction();

        // try {
            $webpageContent = WebpageContent::create($validatedData);
            // DB::commit();
            $this->emit('webpageContentAdded');
        // } catch (\Exception $e) {
        //     DB::rollback();
        // }
    }

    public function getHighestPosition()
    {
        $position = 0;

        foreach ($this->webpage->webpageContents as $webPageContent) {
            $position++;
        }

        return $position;
    }

    public function updatedValue($value)
    {
      /* dd ($value); */
    }

    public function webpageContentCreatedCompleted()
    {
        $this->emit('webpageContentAdded');
    }
}

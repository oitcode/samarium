<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use App\Traits\ModesTrait; 
use App\Models\Cms\Webpage\WebpageContent;

class WebpageDisplayWebpageContentCreate extends Component
{
    use WithFileUploads;
    use ModesTrait;

    public $webpage;

    public $position;
    public $title;
    public $body; 
    public $image;
    public $video_link;

    public $modes = [
        'headingMode' => false,
        'imageMode' => false,
        'paragraphMode' => false,
        'mediaAndTextMode' => false,
        'galleryMode' => false,
        'rowMode' => false,
        'youtubeVideoMode' => false,
    ];

    protected $listeners = [
        'webpageContentCreateHeadingCompleted' => 'webpageContentCreateCompleted',
        'webpageContentCreateHeadingCancelled' => 'webpageContentCreateCancelled',
        'webpageContentCreateParagraphCompleted' => 'webpageContentCreateCompleted',
        'webpageContentCreateParagraphCancelled' => 'webpageContentCreateCancelled',
        'webpageContentCreateMediaAndTextCompleted' => 'webpageContentCreateCompleted',
        'webpageContentCreateMediaAndTextCancelled' => 'webpageContentCreateCancelled',
        'webpageContentCreateImageCompleted' => 'webpageContentCreateCompleted',
        'webpageContentCreateImageCancelled' => 'webpageContentCreateCancelled',
        'webpageContentCreateGalleryCompleted' => 'webpageContentCreateCompleted',
        'webpageContentCreateGalleryCancelled' => 'webpageContentCreateCancelled',
        'webpageContentCreateRowCompleted' => 'webpageContentCreateCompleted',
        'webpageContentCreateYoutubeVideoCompleted' => 'webpageContentCreateCompleted',
        'webpageContentCreateYoutubeVideoCancelled' => 'webpageContentCreateCancelled',
        'webpageContentCreateCancelled',
    ];

    public function render(): View
    {
        return view('livewire.cms.dashboard.webpage-display-webpage-content-create');
    }

    public function store(): void
    {
        $validatedData = $this->validate([
            'title' => 'nullable',
            'body' => 'nullable', 
            /* 'value' => 'nullable', */
            'image' => 'nullable|image',
            'video_link' => 'nullable',
        ]);

        $validatedData['position'] = $this->getHighestPosition();

        if ($this->image) {
            $image_path = $this->image->store('webpage-content', 'public');
            $validatedData['image_path'] = $image_path;
        }

        $validatedData['webpage_id'] = $this->webpage->webpage_id;

        /* $validatedData['body'] = $validatedData['value']; */
        $webpageContent = WebpageContent::create($validatedData);
        $this->dispatch('webpageContentAdded');
    }

    public function getHighestPosition(): int
    {
        $position = 0;

        foreach ($this->webpage->webpageContents as $webPageContent) {
            $position++;
        }

        return $position;
    }

    public function updatedValue($value): void
    {
      //
    }

    public function webpageContentCreateCompleted(): void
    {
        $this->dispatch('webpageContentAdded');
    }

    public function webpageContentCreateCancelled(): void
    {
        $this->dispatch('webpageContentCreateCancelledL2');
    }
}

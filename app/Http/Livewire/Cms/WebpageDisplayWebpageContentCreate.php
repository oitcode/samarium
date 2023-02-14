<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

use App\WebpageContent;

class WebpageDisplayWebpageContentCreate extends Component
{
    use WithFileUploads;

    public $webpage;

    public $position;
    public $title;
    public $body;
    public $image;
    public $video_link;

    public function render()
    {
        return view('livewire.cms.webpage-display-webpage-content-create');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'nullable',
            'body' => 'nullable',
            'image' => 'nullable|image',
            'video_link' => 'nullable',
        ]);

        $validatedData['position'] = $this->getHighestPosition();

        if ($this->image) {
            $image_path = $this->image->store('webpage-content', 'public');
            $validatedData['image_path'] = $image_path;
        }

        $validatedData['webpage_id'] = $this->webpage->webpage_id;

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
}

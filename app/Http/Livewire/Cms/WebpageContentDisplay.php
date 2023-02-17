<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use App\Traits\ModesTrait;

use App\WebpageContent;

class WebpageContentDisplay extends Component
{
    use ModesTrait;

    public $webpageContent;

    public $modes = [
        'edit' => false,
    ];

    protected $listeners = [
        'webpageContentUpdated',
        'exitWebpageContentEditMode',
    ];

    public function render()
    {
        return view('livewire.cms.webpage-content-display');
    }

    public function deleteContent()
    {
        $this->webpageContent->delete();

        $this->emit('webpageContentDeleted');
    }

    public function moveUp()
    {
        /* Skip for first item */
        if ($this->webpageContent->position == $this->webpageContent->webpage->webpageContents()->orderBy('position', 'asc')->first()->position) {
            return;
        }

        $previousItem = $this->getPreviousItem($this->webpageContent);

        $temp = $previousItem->position;
        $previousItem->position = $this->webpageContent->position;
        $this->webpageContent->position = $temp;

        $previousItem->save();
        $this->webpageContent->save();

        $this->emit('webpageContentPositionChanged');
    }

    public function moveDown()
    {
        /* Skip for last item */
        if ($this->webpageContent->position == $this->webpageContent->webpage->webpageContents()->orderBy('position', 'desc')->first()->position) {
            return;
        }

        $nextItem = $this->getNextItem($this->webpageContent);

        $temp = $nextItem->position;
        $nextItem->position = $this->webpageContent->position;
        $this->webpageContent->position = $temp;

        $nextItem->save();
        $this->webpageContent->save();

        $this->emit('webpageContentPositionChanged');
    }

    public function getNextItem(WebpageContent $webpageContent)
    {
        $nextItem = $webpageContent->webpage
            ->webpageContents()->where('position', '>', $webpageContent->position)
            ->orderBy('position', 'asc')
            ->first();

        return $nextItem;
    }

    public function getPreviousItem(WebpageContent $webpageContent)
    {
        $previousItem = $webpageContent->webpage
            ->webpageContents()->where('position', '<', $webpageContent->position)
            ->orderBy('position', 'desc')
            ->first();

        return $previousItem;
    }

    public function webpageContentUpdated()
    {
        $this->exitMode('edit');
    }

    public function exitWebpageContentEditMode()
    {
        $this->exitMode('edit');
    }
}

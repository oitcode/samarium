<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use App\Traits\ModesTrait;
use App\Models\Cms\Webpage\WebpageContent;

class WebpageContentDisplay extends Component
{
    use ModesTrait;

    public $webpageContent;

    public $modes = [
        'edit' => false,
        'delete' => false,
        'confirmDelete' => false,
        'css' => false,
    ];

    protected $listeners = [
        'webpageContentUpdated',
        'exitWebpageContentEditMode',
        'webpageContentEditCssCancel',
        'webpageContentEditCssCompleted',
    ];

    public function render(): View
    {
        return view('livewire.cms.dashboard.webpage-content-display');
    }

    public function deleteContent(): void
    {
        foreach ($this->webpageContent->cmsWebpageContentCssOptions as $cmsWebpageContentCssOption) {
            $cmsWebpageContentCssOption->delete();
        }

        $this->webpageContent->delete();

        $this->dispatch('webpageContentDeleted');
    }

    public function moveUp(): void
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

        $this->dispatch('webpageContentPositionChanged');
    }

    public function moveDown(): void
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

        $this->dispatch('webpageContentPositionChanged');
    }

    public function getNextItem(WebpageContent $webpageContent): WebpageContent
    {
        $nextItem = $webpageContent->webpage
            ->webpageContents()->where('position', '>', $webpageContent->position)
            ->orderBy('position', 'asc')
            ->first();

        return $nextItem;
    }

    public function getPreviousItem(WebpageContent $webpageContent): WebpageContent
    {
        $previousItem = $webpageContent->webpage
            ->webpageContents()->where('position', '<', $webpageContent->position)
            ->orderBy('position', 'desc')
            ->first();

        return $previousItem;
    }

    public function webpageContentUpdated(): void
    {
        $this->exitMode('edit');
    }

    public function exitWebpageContentEditMode(): void
    {
        $this->exitMode('edit');
    }

    public function webpageContentEditCssCancel(): void
    {
        $this->exitMode('css');
    }

    public function webpageContentEditCssCompleted(): void
    {
        $this->exitMode('css');
    }
}

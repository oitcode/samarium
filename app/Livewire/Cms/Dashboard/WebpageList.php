<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Cms\WebpageService;
use App\Models\Cms\Webpage\Webpage;

class WebpageList extends Component
{
    use WithPagination;
    use ModesTrait;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    /**
     * Webpage per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of webpages
     *
     * @var int
     */
    public $totalWebpageCount;

    /**
     * Webpage which needs to be deleted
     *
     * @var Gallery
     */
    public $deletingWebpage;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'confirmDelete' => false,
        'cannotDelete' => false,
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(WebpageService $webpageService): View
    {
        $webpages = $webpageService->getPaginatedWebpages($this->perPage);
        $this->totalWebpageCount = $webpageService->getTotalWebpageCount();

        return view('livewire.cms.dashboard.webpage-list', [
            'webpages' => $webpages,
        ]);
    }

    /**
     * Confirm if user really wants to delete a webpage
     *
     * @return void
     */
    public function confirmDeleteWebpage(int $webpage_id, WebpageService $webpageService): void
    {
        $this->deletingWebpage = Webpage::find($webpage_id);

        if ($webpageService->canDeleteWebpage($webpage_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel webpage delete
     *
     * @return void
     */
    public function cancelDeleteWebpage(): void
    {
        $this->deletingWebpage = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a webpage cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteWebpage(): void
    {
        $this->deletingWebpage = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete webpage
     *
     * @return void
     */
    public function deleteWebpage(WebpageService $webpageService): void
    {
        $webpageService->deleteWebpage($this->deletingWebpage->webpage_id);
        $this->deletingWebpage = null;
        $this->exitMode('confirmDelete');
    }
}

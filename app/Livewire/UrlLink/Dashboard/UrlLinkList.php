<?php

namespace App\Livewire\UrlLink\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\UrlLink\UrlLinkService;
use App\UrlLink;

/**
 * UrlLinkList Component
 * 
 * This Livewire component handles the listing of url links.
 * It also handles deletion of url links.
 */
class UrlLinkList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Url links per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of url links
     *
     * @var int
     */
    public $totalUrlLinkCount;

    /**
     * Url link which needs to be deleted
     *
     * @var UrlLink
     */
    public $deletingUrlLink;

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
    public function render(UrlLinkService $urlLinkService): View
    {
        $urlLinks = $urlLinkService->getPaginatedUrlLinks($this->perPage);
        $this->totalUrlLinkCount = $urlLinkService->getTotalUrlLinkCount();

        return view('livewire.url-link.dashboard.url-link-list', [
            'urlLinks' => $urlLinks,
        ]);
    }

    /**
     * Confirm if user really wants to delete a url link
     *
     * @return void
     */
    public function confirmDeleteUrlLink(int $url_link_id, UrlLinkService $urlLinkService): void
    {
        $this->deletingUrlLink = UrlLink::find($url_link_id);

        if ($urlLinkService->canDeleteUrlLink($url_link_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel url link delete
     *
     * @return void
     */
    public function cancelDeleteUrlLink(): void
    {
        $this->deletingUrlLink = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that an url link cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteUrlLink(): void
    {
        $this->deletingUrlLink = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete url link
     *
     * @return void
     */
    public function deleteUrlLink(UrlLinkService $urlLinkService): void
    {
        $urlLinkService->deleteUrlLink($this->deletingUrlLink->url_link_id);
        $this->deletingUrlLink = null;
        $this->exitMode('confirmDelete');
    }
}

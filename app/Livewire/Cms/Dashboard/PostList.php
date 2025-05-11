<?php

namespace App\Livewire\Cms\Dashboard;

use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Cms\PostService;
use App\Webpage;

/**
 * PostList Component
 * 
 * This Livewire component handles the listing of posts.
 */
class PostList extends Component
{
    use WithPagination;
    use ModesTrait;

    /* Use bootstrap pagination theme */
    protected $paginationTheme = 'bootstrap';

    /**
     * Posts per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of posts
     *
     * @var int
     */
    public $totalPostCount;

    /**
     * Post which needs to be deleted
     *
     * @var Webpage
     */
    public $deletingPost;

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
    public function render(PostService $postService): View
    {
        $posts = $postService->getPaginatedPosts($this->perPage);
        $this->totalPostCount = $postService->getTotalPostCount();

        return view('livewire.cms.dashboard.post-list', [
            'posts' => $posts,
        ]);
    }

    /**
     * Confirm if user really wants to delete a post
     *
     * @return void
     */
    public function confirmDeletePost(int $webpage_id, PostService $postService): void
    {
        $this->deletingPost = Webpage::find($webpage_id);

        if ($postService->canDeletePost($webpage_id)) {
            $this->enterMode('confirmDelete');
        } else {
            $this->enterMode('cannotDelete');
        }
    }

    /**
     * Cancel post delete
     *
     * @return void
     */
    public function cancelDeletePost(): void
    {
        $this->deletingPost = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that a post cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeletePost(): void
    {
        $this->deletingPost = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete post
     *
     * @return void
     */
    public function deletePost(PostService $postService): void
    {
        $postService->deletePost($this->deletingPost->webpage_id);
        $this->deletingPost = null;
        $this->exitMode('confirmDelete');
    }
}

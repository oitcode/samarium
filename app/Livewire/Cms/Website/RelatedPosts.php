<?php

namespace App\Livewire\Cms\Website;

use Livewire\Component;
use Illuminate\View\View;
use App\Webpage;

class RelatedPosts extends Component
{
    public $webpage;

    public $relation;

    public $relatedPosts;

    public function render(): View
    {
        $this->populateRelatedPosts();

        return view('livewire.cms.website.related-posts');
    }

    public function populateRelatedPosts(): void
    {
        if ($this->relation == 'previous') {
            $posts = Webpage::where('is_post', 'yes')
                ->where('webpage_id', '<', $this->webpage->webpage_id)
                ->orderBy('webpage_id', 'desc')
                ->limit('4')
                ->get();
        }

        $this->relatedPosts = $posts;
    }
}

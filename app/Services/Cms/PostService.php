<?php

namespace App\Services\Cms;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Cms\Webpage\Webpage;

class PostService
{
    /**
     * Get paginated list of webpages
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedPosts(int $perPage = 5): LengthAwarePaginator
    {
        return Webpage::where('is_post', 'yes')->orderBy('webpage_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new post
     *
     * @param array $data
     * @param UploadedFile|null $image
     * @return Webpage
     */
    public function createPost(array $data): Webpage
    {
        return Webpage::create($data);
    }

    /**
     * Check if a post can be deleted.
     *
     * @param int $webpage_id
     * @return void
     */
    public function canDeletePost(int $webpage_id): bool
    {
        $webpage = Webpage::find($webpage_id);

        if (count($webpage->cmsNavMenuDropdownItems) > 0 || count($webpage->cmsNavMenuItems) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete post
     *
     * @param int $webpage_id
     * @return void
     */
    public function deletePost(int $webpage_id): void
    {
        // Todo: Many related rows from other tables must be
        //       deleted before deleting the post. This
        //       case must be handled soon.
        $webpage = Webpage::find($webpage_id);

        $webpage->delete();
    }

    /**
     * Get total post count
     *
     * @return int
     */
    public function getTotalPostCount(): int
    {
        return Webpage::where('is_post', 'yes')->count();
    }
}

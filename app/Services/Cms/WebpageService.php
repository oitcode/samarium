<?php

namespace App\Services\Cms;

use App\Webpage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;

class WebpageService
{
    /**
     * Get paginated list of webpages
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedWebpages(int $perPage = 5): LengthAwarePaginator
    {
        return Webpage::where('is_post', '!=', 'yes')->orderBy('webpage_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new webpage
     *
     * @param array $data
     * @param UploadedFile|null $image
     * @return Webpage
     */
    public function createWebpage(array $data): Webpage
    {
        return Webpage::create($data);
    }

    /**
     * Check if a webpage can be deleted.
     *
     * @param int $webpage_id
     * @return void
     */
    public function canDeleteWebpage(int $webpage_id): bool
    {
        $webpage = Webpage::find($webpage_id);

        if (count($webpage->cmsNavMenuDropdownItems) > 0 || count($webpage->cmsNavMenuItems) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Delete webpage
     *
     * @param int $webpage_id
     * @return void
     */
    public function deleteWebpage(int $webpage_id): void
    {
        // Todo: Many related rows from other tables must be
        //       deleted before deleting the webpage. This
        //       case must be handled soon.
        $webpage = Webpage::find($webpage_id);

        $webpage->delete();
    }

    /**
     * Get total webpage count
     *
     * @return int
     */
    public function getTotalWebpageCount(): int
    {
        return Webpage::where('is_post', '!=', 'yes')->count();
    }
}

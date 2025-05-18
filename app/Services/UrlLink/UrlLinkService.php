<?php

namespace App\Services\UrlLink;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\UrlLink;

class UrlLinkService
{
    /**
     * Get paginated list of url links
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedUrlLinks(int $perPage = 5): LengthAwarePaginator
    {
        return UrlLink::orderBy('url_link_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new url link
     *
     * @param array $data
     * @return UrlLink
     */
    public function createUrlLink(array $data): UrlLink
    {
        $urlLink = UrlLink::create($data);

        return $urlLink;
    }

    /**
     * Check if a url link can be deleted.
     *
     * @param int $url_link_id
     * @return void
     */
    public function canDeleteUrlLink(int $url_link_id): bool
    {
        $urlLink = UrlLink::find($url_link_id);

        // Todo

        return true;
    }

    /**
     * Delete url link
     *
     * @param int $url_link_id
     * @return void
     */
    public function deleteUrlLink(int $url_link_id): void
    {
        $urlLink = UrlLink::find($url_link_id);

        $urlLink->delete();
    }

    /**
     * Get total url link count
     *
     * @return int
     */
    public function getTotalUrlLinkCount(): int
    {
        return UrlLink::count();
    }
}

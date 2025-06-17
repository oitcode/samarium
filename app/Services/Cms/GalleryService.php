<?php

namespace App\Services\Cms;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Gallery\Gallery;
use App\Models\Gallery\GalleryImage;

class GalleryService
{
    /**
     * Get paginated list of galleries
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedGalleries(int $perPage = 5): LengthAwarePaginator
    {
        return Gallery::orderBy('gallery_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new gallery
     *
     * @param array $data
     * @param UploadedFile|null $image
     * @return Gallery
     */
    public function createGallery(array $data): Gallery
    {
        return Gallery::create($data);
    }

    /**
     * Check if a gallery can be deleted.
     *
     * @param int $gallery_id
     * @return void
     */
    public function canDeleteGallery(int $gallery_id): bool
    {
        // Todo

        return true;
    }

    /**
     * Delete gallery
     *
     * @param int $gallery_id
     * @return void
     */
    public function deleteGallery(int $gallery_id): void
    {
        $gallery = Gallery::find($gallery_id);

        foreach ($gallery->galleryImages as $galleryImage) {
            $galleryImage->delete();
        }

        $gallery->delete();
    }

    /**
     * Get total gallery count
     *
     * @return int
     */
    public function getTotalGalleryCount(): int
    {
        return Gallery::count();
    }

    /**
     * Delete an image from gallery
     *
     * @return void
     */
    public function deleteImageFromGallery(int $galleryImageId): void
    {
        $galleryImage = GalleryImage::find($galleryImageId);

        $galleryImage->delete();
    }

    /**
     * Get the preceeding image of an image
     *
     * @return GalleryImage
     */
    public function getPreviousImage(int $galleryImageId): GalleryImage
    {
        $galleryImage = GalleryImage::find($galleryImageId);

        $previousItem = $galleryImage->gallery
            ->galleryImages()->where('position', '<', $galleryImage->position)
            ->orderBy('position', 'desc')
            ->first();

        return $previousItem;
    }

    /**
     * Get the next image of an image
     *
     * @return GalleryImage
     */
    public function getNextImage(int $galleryImageId): GalleryImage
    {
        $galleryImage = GalleryImage::find($galleryImageId);

        $nextItem = $galleryImage->gallery
            ->galleryImages()->where('position', '>', $galleryImage->position)
            ->orderBy('position', 'asc')
            ->first();

        return $nextItem;
    }
}

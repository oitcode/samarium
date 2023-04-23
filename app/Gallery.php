<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gallery';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'gallery_id';

    protected $fillable = [
        'name', 'description', 'comment',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */


    /*
     * gallery_image table.
     *
     */
    public function galleryImages()
    {
        return $this->hasMany('App\GalleryImage', 'gallery_id', 'gallery_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */


    /*
     * Total space occupied by the gallery.
     *
     */
    public function totalDiskSpaceOccupied()
    {
        $total = 0;

        foreach ($this->galleryImages as $galleryImage) {
            $total += $galleryImage->totalDiskSpaceOccupied();
        }

        return $this->humanFileSize($total);
    }

    /*
     * Get file size in human readable format.
     *
     * This solution is based on answer in 
     * https://stackoverflow.com/questions/15188033/human-readable-file-size
     *
     */
    public function humanFileSize($size,$unit="")
    {
        if( (!$unit && $size >= 1<<30) || $unit == "GB")
          return number_format($size/(1<<30),2)." GB";
        if( (!$unit && $size >= 1<<20) || $unit == "MB")
          return number_format($size/(1<<20),2)." MB";
        if( (!$unit && $size >= 1<<10) || $unit == "KB")
          return number_format($size/(1<<10),2)." KB";
        return number_format($size)." bytes";
    }
}

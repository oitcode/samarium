<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gallery_image';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'gallery_image_id';

    protected $fillable = [
        'gallery_id', 'position', 'image_path', 'comment',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */


    /*
     * gallery table.
     *
     */
    public function gallery()
    {
        return $this->belongsTo('App\Models\Gallery\Gallery', 'gallery_id', 'gallery_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */


    /*
     * Total space occupied by the gallery image.
     *
     */
    public function totalDiskSpaceOccupied()
    {
        $imagePath = 'storage/' . $this->image_path;

        return filesize($imagePath);
    }
}

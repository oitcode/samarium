<?php

namespace App;

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
        'gallery_id', 'image_path', 'comment',
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
        return $this->belongsTo('App\GalleryImage', 'gallery_id', 'gallery_id');
    }
}

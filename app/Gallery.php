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
}

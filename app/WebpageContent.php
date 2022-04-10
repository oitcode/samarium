<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebpageContent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webpage_content';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'webpage_content_id';

    protected $fillable = [
         'webpage_id', 'body', 'image_path',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * webpage_content table.
     *
     */
    public function webpage()
    {
        return $this->belongsTo('App\Webpage', 'webpage_id', 'webpage_id');
    }
}

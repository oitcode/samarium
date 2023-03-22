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
         'webpage_id', 'position', 'title', 'body', 'image_path', 'video_link',
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

    /*
     * cms_webpage_content_css_option table.
     *
     */
    public function cmsWebpageContentCssOptions()
    {
        return $this->hasMany('App\CmsWebpageContentCssOption', 'webpage_content_id', 'webpage_content_id');
    }
}

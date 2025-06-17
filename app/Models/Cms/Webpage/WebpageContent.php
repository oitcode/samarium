<?php

namespace App\Models\Cms\Webpage;

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

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['webpage'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'webpage_id', 'position', 'title', 'body', 'image_path', 'video_link',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * webpage table.
     *
     */
    public function webpage()
    {
        return $this->belongsTo('App\Models\Cms\Webpage\Webpage', 'webpage_id', 'webpage_id');
    }

    /*
     * cms_webpage_content_css_option table.
     *
     */
    public function cmsWebpageContentCssOptions()
    {
        return $this->hasMany('App\Models\Cms\Webpage\CmsWebpageContentCssOption', 'webpage_content_id', 'webpage_content_id');
    }
}

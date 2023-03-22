<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsWebpageContentCssOption extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_webpage_content_css_option';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cms_webpage_content_css_option_id';

    protected $fillable = [
         'webpage_content_id',
         'option_name', 'option_value',
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
    public function webpageContent()
    {
        return $this->belongsTo('App\WebpageContent', 'webpage_content_id', 'webpage_content_id');
    }
}

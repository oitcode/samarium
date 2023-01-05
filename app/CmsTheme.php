<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsTheme extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_theme';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cms_theme_id';

    protected $fillable = [
         'name', 'top_header_color', 'footer_color', 'hero_image_path',
    ];
}

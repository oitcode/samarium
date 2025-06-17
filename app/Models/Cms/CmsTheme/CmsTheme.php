<?php

namespace App\Models\Cms\CmsTheme;

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
         'name',
         'ascent_bg_color', 'ascent_text_color',
         'top_header_bg_color', 'top_header_text_color',
         'nav_menu_bg_color', 'nav_menu_text_color',
         'footer_bg_color', 'footer_text_color',
         'heading_color',
         'hero_image_path',
    ];
}

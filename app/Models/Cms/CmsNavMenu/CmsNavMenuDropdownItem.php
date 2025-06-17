<?php

namespace App\Models\Cms\CmsNavMenu;

use Illuminate\Database\Eloquent\Model;

class CmsNavMenuDropdownItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_nav_menu_dropdown_item';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cms_nav_menu_dropdown_item_id';

    protected $fillable = [
         'cms_nav_menu_item_id', 'order', 'name', 'webpage_id',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * nav_menu table.
     *
     */
    public function cmsNavMenuItem()
    {
        return $this->belongsTo('App\Models\Cms\CmsNavMenu\CmsNavMenuItem', 'cms_nav_menu_item_id', 'cms_nav_menu_item_id');
    }

    /*
     * webpage table.
     *
     */
    public function webpage()
    {
        return $this->belongsTo('App\Models\Cms\Webpage\Webpage', 'webpage_id', 'webpage_id');
    }
}

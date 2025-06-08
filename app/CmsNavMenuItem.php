<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsNavMenuItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_nav_menu_item';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cms_nav_menu_item_id';

    protected $fillable = [
         'cms_nav_menu_id', 'order', 'name', 'type', 'webpage_id',
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
    public function cmsNavMenu()
    {
        return $this->belongsTo('App\CmsNavMenu', 'cms_nav_menu_id', 'cms_nav_menu_id');
    }

    /*
     * webpage table.
     *
     */
    public function webpage()
    {
        return $this->belongsTo('App\Models\Cms\Webpage\Webpage', 'webpage_id', 'webpage_id');
    }

    /*
     * cms_nav_menu_dropdown_item table.
     *
     */
    public function cmsNavMenuDropdownItems()
    {
        return $this->hasMany('App\CmsNavMenuDropdownItem', 'cms_nav_menu_item_id', 'cms_nav_menu_item_id');
    }
}

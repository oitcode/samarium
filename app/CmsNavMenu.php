<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsNavMenu extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_nav_menu';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cms_nav_menu_id';

    protected $fillable = [
         'name',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * nav_menu_item table.
     *
     */
    public function cmsNavMenuItems()
    {
        return $this->hasMany('App\CmsNavMenuItem', 'cms_nav_menu_id', 'cms_nav_menu_id');
    }
}

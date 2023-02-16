<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webpage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webpage';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'webpage_id';

    protected $fillable = [
         'name', 'permalink', 'is_post', 'featured_image',
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
        return $this->hasMany('App\CmsNavMenuItem', 'webpage_id', 'webpage_id');
    }

    /*
     * nav_menu_dropdown_item table.
     *
     */
    public function cmsNavMenuDropdownItems()
    {
        return $this->hasMany('App\CmsNavMenuDropdownItem', 'webpage_id', 'webpage_id');
    }

    /*
     * webpage_content table.
     *
     */
    public function webpageContents()
    {
        return $this->hasMany('App\WebpageContent', 'webpage_id', 'webpage_id');
    }


    /*-------------------------------------------------------------------------
     * Other methods
     *-------------------------------------------------------------------------
     *
     */
    public function getFirstPara()
    {
        foreach ($this->webpageContents as $webpageContent) {
            if (!webpageContent->body) {
                return $webpageContent;

                /* Really ?*/
                break;
            }
        }
    }

}

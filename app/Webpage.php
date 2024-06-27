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
         'creator_id', 'name', 'permalink', 'is_post', 'visibility', 'featured_image', 'website_views',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * users table.
     *
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    /*
     * webpage_category table.
     *
     */
    public function webpageCategories()
    {
        return $this->belongsToMany('App\WebpageCategory', 'webpage__webpage_category', 'webpage_id', 'webpage_category_id');
    }

    /*
     * webpage_category table. (postpage)
     *
     */
    public function webpageCategoriesPostpage()
    {
        return $this->belongsToMany('App\WebpageCategory', 'webpage__webpage_category___postpage', 'webpage_id', 'webpage_category_id');
    }

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
            if ($webpageContent->body) {
                return $webpageContent;

                /* Really ?*/
                break;
            }
        }
    }

    public function getHighestContentPosition()
    {
        $highest = 0;

        foreach ($this->webpageContents as $webpageContent) {
            if ($webpageContent->position > $highest) {
                $highest = $webpageContent->position;
            }
        }

        return $highest;
    }

    public function hasCategory($name)
    {
        foreach ($this->webpageCategories as $category) {
            if (strtolower($category->name) == strtolower($name)) {
                return true;
            }
        }

        return false;
    }

}

<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_category';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_category_id';

    protected $fillable = [
         'name', 'parent_product_category_id', 'image_path', 'does_sell',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * product table.
     *
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product\Product', 'product_category_id', 'product_category_id');
    }

    /*
     * Sub product categories.
     *
     */
    public function subProductCategories()
    {
        return $this->hasMany('App\Models\Product\ProductCategory', 'parent_product_category_id', 'product_category_id');
    }

    /*
     * Parent category.
     *
     */
    public function parentProductCategory()
    {
        return $this->belongsTo('App\Models\Product\ProductCategory', 'parent_product_category_id', 'product_category_id');
    }

    /*
     * webpage table.
     *
     */
    public function webPages()
    {
        return $this->belongsToMany('App\Models\Cms\Webpage\Webpage', 'webpage__product_category', 'product_category_id', 'webpage_id');
    }
}

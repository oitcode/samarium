<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebpageCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webpage_category';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'webpage_category_id';

    protected $fillable = [
         'name',
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
    public function webPages()
    {
        return $this->belongsToMany('App\Webpage', 'webpage__webpage_category', 'webpage_category_id', 'webpage_id');
    }

    /*
     * webpage table.
     *
     */
    public function webPagesPostpage()
    {
        return $this->belongsToMany('App\Webpage', 'webpage__webpage_category___postpage', 'webpage_category_id', 'webpage_id');
    }
}

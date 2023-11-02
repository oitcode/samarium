<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductQuestion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_question';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'product_question_id';

    protected $fillable = [
         'product_id',
         'writer_name', 'writer_info',
         'question_text',
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
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'product_id');
    }
}

<?php

namespace App\Models\Product;

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
        return $this->belongsTo('App\Models\Product\Product', 'product_id', 'product_id');
    }

    /*
     * product_answer table.
     *
     */
    public function productAnswers()
    {
        return $this->hasMany('App\Models\Product\ProductAnswer', 'product_question_id', 'product_question_id');
    }
}

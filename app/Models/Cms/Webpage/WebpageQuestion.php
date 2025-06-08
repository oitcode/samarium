<?php

namespace App\Models\Cms\Webpage;

use Illuminate\Database\Eloquent\Model;

class WebpageQuestion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'webpage_question';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'webpage_question_id';

    protected $fillable = [
         'webpage_id',
         'writer_name',
         'writer_email', 'writer_phone',
         'question_text',
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
    public function webpage()
    {
        return $this->belongsTo('App\Webpage', 'webpage_id', 'webpage_id');
    }
}

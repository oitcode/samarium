<?php

namespace App\Models\Unused;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale_item';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'sale_item_id';

    protected $fillable = [
         'sale_id', 'title', 'amount',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * sale table.
     *
     */
    public function sale()
    {
        return $this->belongsTo('App\Models\Unused\Sale', 'sale_id', 'sale_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseAdditionHeading extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase_addition_heading';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'purchase_addition_heading_id';

    protected $fillable = [
         'name', 'effect',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * purchase_addition table.
     *
     */
    public function purchaseAdditions()
    {
        return $this->hasMany('App\PurchaseAddition', 'purchase_addition_heading_id', 'purchase_addition_heading_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbAccountType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ab_account_type';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ab_account_type_id';

    protected $fillable = [
         'name', 'parent_ab_account_type_id',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * ab_account table.
     *
     */
    public function abAccounts()
    {
        return $this->hasMany('App\AbAccount', 'ab_account_type_id', 'ab_account_type_id');
    }
}

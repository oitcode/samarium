<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbAccount extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ab_account';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ab_account_id';

    protected $fillable = [
         'name',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * journal_entry_item table.
     *
     */
    public function journalEntryItems()
    {
        return $this->hasMany('App\JournalEntryItem', 'ab_account_id', 'ab_account_id');
    }

    /*
     * customer table.
     *
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'ab_account_id', 'ab_account_id');
    }
}

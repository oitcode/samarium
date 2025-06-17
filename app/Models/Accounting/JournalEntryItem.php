<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class JournalEntryItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'journal_entry_item';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'journal_entry_item_id';

    protected $fillable = [
        'journal_entry_id', 'ab_account_id', 'type', 'amount',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * journal_entry table.
     *
     */
    public function journalEntry()
    {
        return $this->belongsTo('App\Models\Accounting\JournalEntry', 'journal_entry_id', 'journal_entry_id');
    }

    /*
     * ab_account table.
     *
     */
    public function abAccount()
    {
        return $this->belongsTo('App\Models\Accounting\AbAccount', 'ab_account_id', 'ab_account_id');
    }
}

<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'journal_entry';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'journal_entry_id';

    protected $fillable = [
        'date', 'notes',
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
        return $this->hasMany('App\Models\Accounting\JournalEntryItem', 'journal_entry_id', 'journal_entry_id');
    }

    /*
     * ledger_entry table.
     *
     */
    public function ledgerEntries()
    {
        return $this->hasMany('App\Models\Accounting\LedgerEntry', 'journal_entry_id', 'journal_entry_id');
    }
}

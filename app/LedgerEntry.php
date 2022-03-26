<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LedgerEntry extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ledger_entry';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'ledger_entry_id';

    protected $fillable = [
        'ab_account_id', 'date',
        'journal_entry_id', 'particulars',
        'related_ab_account_id', 'type',
        'amount',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * ab_account table.
     *
     * The ab_account to which the ledger entry belongs.
     *
     */
    public function abAccount()
    {
        return $this->belongsTo('App\AbAccount', 'ab_account_id', 'ab_account_id');
    }

    /*
     * journal_entry table.
     *
     * The journal_entry from which the ledger_entry is made.
     *
     */
    public function journalEntry()
    {
        return $this->belongsTo('App\JournalEntry', 'journal_entry_id', 'journal_entry_id');
    }
    /*
     * ab_account table (related).
     *
     * The related ab_account of the entry.
     *
     */

    public function relatedAbAccount()
    {
        return $this->belongsTo('App\AbAccount', 'related_ab_account_id', 'ab_account_id');
    }
}

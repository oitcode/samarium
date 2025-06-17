<?php

namespace App\Models\Accounting;

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
         'name', 'ab_account_type_id', 'increase_type',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * ab_account_type table.
     *
     */
    public function abAccountType()
    {
        return $this->belongsTo('App\Models\Accounting\AbAccountType', 'ab_account_type_id', 'ab_account_type_id');
    }

    /*
     * journal_entry_item table.
     *
     */
    public function journalEntryItems()
    {
        return $this->hasMany('App\Models\Accounting\JournalEntryItem', 'ab_account_id', 'ab_account_id');
    }

    /*
     * customer table.
     *
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer\Customer', 'ab_account_id', 'ab_account_id');
    }

    /*
     * ledger_entry table.
     *
     */
    public function ledgerEntries()
    {
        return $this->hasMany('App\Models\Accounting\LedgerEntry', 'ab_account_id', 'ab_account_id');
    }

    /*
     * ledger_entry table (by being related in the entry).
     *
     */
    public function relatedLedgerEntries()
    {
        return $this->hasMany('App\Models\Accounting\LedgerEntry', 'related_ab_account_id', 'ab_account_id');
    }


    /*-------------------------------------------------------------------------
     * Methods
     *-------------------------------------------------------------------------
     *
     */

    public function getLedgerBalance()
    {
        $balance = 0;

        foreach ($this->ledgerEntries as $ledgerEntry) {
            if ($ledgerEntry->type == 'debit') {
                $balance += $ledgerEntry->amount;
            } else if ($ledgerEntry->type == 'credit') {
                $balance -= $ledgerEntry->amount;
            } else {
                // Todo
            }
        }

        return $balance;
    }

    public function hasDebitBalance()
    {
        if ($this->getLedgerBalance() >= 0) {
            return true;
        } else if ($this->getLedgerBalance() < 0) {
            return false;
        } else {
            // Todo
        }
    }

    public function hasCreditBalance()
    {
        if ($this->getLedgerBalance() >= 0) {
            return false;
        } else if ($this->getLedgerBalance() < 0) {
            return true;
        } else {
            // Todo
        }
    }

}

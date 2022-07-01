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
         'name', 'ab_account_type_id', 'increase_type',
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

    /*
     * ledger_entry table.
     *
     */
    public function ledgerEntries()
    {
        return $this->hasMany('App\LedgerEntry', 'ab_account_id', 'ab_account_id');
    }

    /*
     * ledger_entry table (by being related in the entry).
     *
     */
    public function relatedLedgerEntries()
    {
        return $this->hasMany('App\LedgerEntry', 'related_ab_account_id', 'ab_account_id');
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
                dd('Whoops');
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
            dd('Whoops');
        }
    }

    public function hasCreditBalance()
    {
        if ($this->getLedgerBalance() >= 0) {
            return false;
        } else if ($this->getLedgerBalance() < 0) {
            return true;
        } else {
            dd('Whoops');
        }
    }

}

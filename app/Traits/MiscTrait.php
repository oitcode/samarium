<?php

namespace App\Traits;

use App\JournalEntry;
use App\JournalEntryItem;
use App\LedgerEntry;
use App\AbAccount;

trait MiscTrait
{
    public function makeAccountingEntry($saleInvoice)
    {
        $journalEntry = new JournalEntry;
        $journalEntry->date = date('Y-m-d');
        $journalEntry->notes = 'Sales made';
        $journalEntry->save();

        if ($saleInvoice->payment_status == 'paid') {

            /* Cash/BankSaving account debit */
            if (strtolower($saleInvoice->saleInvoicePayments()->first()->saleInvoicePaymentType->name) == 'cash') {
                $accName = 'cash';
            } else if (strtolower($saleInvoice->saleInvoicePayments()->first()->saleInvoicePaymentType->name) == 'card') {
                $accName = 'banksaving';
            } else if (strtolower($saleInvoice->saleInvoicePayments()->first()->saleInvoicePaymentType->name) == 'fonepay') {
                $accName = 'banksaving';
            }
            $this->makeJournalEntryItem($journalEntry, $accName, $saleInvoice->getTotalAmount(), 'debit');


            /* Sales account credit */
            $this->makeJournalEntryItem($journalEntry, 'sales', $saleInvoice->getTotalAmount(), 'credit');

        } else if ($saleInvoice->payment_status == 'partially_paid') {
            /*
             * Cash account debit
             */

            $journalEntryItem = new JournalEntryItem;

            $journalEntryItem->journal_entry_id = $journalEntry->journal_entry_id;
            $journalEntryItem->ab_account_id = AbAccount::where('name', 'cash')->first()->getKey();
            $journalEntryItem->type = 'debit';
            $journalEntryItem->amount = $saleInvoice->getPaidAmount();

            $journalEntryItem->save();

            /*
             * Customer account debit
             *
             * account receivable
             *
             */

            $journalEntryItem = new JournalEntryItem;

            $journalEntryItem->journal_entry_id = $journalEntry->journal_entry_id;

            $journalEntryItem->ab_account_id = $saleInvoice->customer->abAccount->ab_account_id;

            $journalEntryItem->type = 'debit';
            $journalEntryItem->amount = $saleInvoice->getPendingAmount();

            $journalEntryItem->save();

            /*
             * Sales account credit
             */

            $journalEntryItem = new JournalEntryItem;

            $journalEntryItem->journal_entry_id = $journalEntry->journal_entry_id;
            $journalEntryItem->ab_account_id = AbAccount::where('name', 'sales')->first()->getKey();
            $journalEntryItem->type = 'credit';
            $journalEntryItem->amount = $saleInvoice->getTotalAmount();

            $journalEntryItem->save();
        } else if ($saleInvoice->payment_status == 'pending') {

            /*
             * Customer account debit
             *
             * account receivable
             *
             */

            $journalEntryItem = new JournalEntryItem;

            $journalEntryItem->journal_entry_id = $journalEntry->journal_entry_id;

            $journalEntryItem->ab_account_id = $saleInvoice->customer->abAccount->ab_account_id;

            $journalEntryItem->type = 'debit';
            $journalEntryItem->amount = $saleInvoice->getTotalAmount();

            $journalEntryItem->save();


            /*
             * Sales account credit
             */

            $journalEntryItem = new JournalEntryItem;

            $journalEntryItem->journal_entry_id = $journalEntry->journal_entry_id;
            $journalEntryItem->ab_account_id = AbAccount::where('name', 'sales')->first()->getKey();
            $journalEntryItem->type = 'credit';
            $journalEntryItem->amount = $saleInvoice->getTotalAmount();

            $journalEntryItem->save();
        } else {
          dd('Whoops');
        }

        $this->makeLedgerEntry($journalEntry);
    }
    public function makeLedgerEntry($journalEntry)
    {
        /* Find single side and multiple sides */
        $debitCount = 0;
        $creditCount = 0;
        foreach ($journalEntry->journalEntryItems as $journalEntryItem) {
            if ($journalEntryItem->type == 'debit') {
                $debitCount++;
            } else if ($journalEntryItem->type == 'credit') {
                $creditCount++;
            } else {
                dd('Whoops');
            }
        }

        $multiSide = '';
        if ($debitCount > 1 && $creditCount > 1) {
            dd('Whoops');
        } else if ($debitCount > 1) {
            $multiSide = 'debit';
        } else if ($creditCount > 1) {
            $multiSide = 'credit';
        }

        foreach ($journalEntry->journalEntryItems as $journalEntryItem) {

            foreach ($journalEntry->journalEntryItems as $jei ) {
                if ($jei->journal_entry_item_id == $journalEntryItem->journal_entry_item_id) {
                    continue;
                }

                if ($jei->type == $journalEntryItem->type) {
                    continue;
                }

                $ledgerEntry = new LedgerEntry;

                $ledgerEntry->date = $journalEntry->date;
                $ledgerEntry->ab_account_id = $journalEntryItem->ab_account_id;
                $ledgerEntry->journal_entry_id = $journalEntry->journal_entry_id;

                if ($jei->type == 'credit') {
                    $ledgerEntry->particulars = 'To ' . $jei->abAccount->name . ' A/c';
                } else if ($jei->type == 'debit') {
                    $ledgerEntry->particulars = 'By ' . $jei->abAccount->name . ' A/c';
                } else {
                    dd('Whoops');
                }

                $ledgerEntry->related_ab_account_id = $jei->abAccount->ab_account_id;
                $ledgerEntry->type = $journalEntryItem->type;

                if ($journalEntryItem->type == $multiSide) {
                    $ledgerEntry->amount = $journalEntryItem->amount;
                } else {
                    $ledgerEntry->amount = $jei->amount;
                }

                $ledgerEntry->save();
            }
        }
    }

    public function makePurchaseAccountingEntry($purchase)
    {
        $journalEntry = new JournalEntry;
        $journalEntry->date = date('Y-m-d');
        $journalEntry->notes = 'Purchase made';
        $journalEntry->save();

        if ($purchase->payment_status == 'paid') {

            /* Purchase account debit */
            $this->makeJournalEntryItem($journalEntry, 'purchase', $purchase->getTotalAmount(), 'debit');


            /* Cash/Bank account credit */

            if (strtolower($purchase->purchasePayments()->first()->purchasePaymentType->name) == 'cash') {
                $accName = 'cash';
            } else if (strtolower($purchase->purchasePayments()->first()->purchasePaymentType->name) == 'card') {
                $accName = 'banksaving';
            } else if (strtolower($purchase->purchasePayments()->first()->purchasePaymentType->name) == 'fonepay') {
                $accName = 'banksaving';
            }
            $this->makeJournalEntryItem($journalEntry, $accName, $purchase->getTotalAmount(), 'credit');

        } else if ($purchase->payment_status == 'partially_paid') {

            /* Purchase account debit */
            $this->makeJournalEntryItem($journalEntry, 'purchase', $purchase->getTotalAmount(), 'debit');


            /* Vendor account credit (account payable) */
            $this->makeJournalEntryItem($journalEntry, $vendorName, $purchase->getPendingAmount(), 'credit');

            /* Cash/Bank account credit */

            if (strtolower($purchase->purchasePayments()->first()->purchasePaymentType->name) == 'cash') {
                $accName = 'cash';
            } else if (strtolower($purchase->purchasePayments()->first()->purchasePaymentType->name) == 'card') {
                $accName = 'banksaving';
            } else if (strtolower($purchase->purchasePayments()->first()->purchasePaymentType->name) == 'fonepay') {
                $accName = 'banksaving';
            }
            $this->makeJournalEntryItem($journalEntry, $accName, $purchase->getTotalAmount(), 'credit');
        } else if ($purchase->payment_status == 'pending') {

            /* Purchase account debit */
            $this->makeJournalEntryItem($journalEntry, 'purchase', $purchase->getTotalAmount(), 'debit');

            /* Vendor account credit (account payable) */
            $this->makeJournalEntryItem($journalEntry, $vendorName, $purchase->getPendingAmount(), 'credit');
        } else {
          dd('Whoops');
        }

        $this->makeLedgerEntry($journalEntry);
    }

    public function makeExpenseAccountingEntry($expense)
    {
        $journalEntry = new JournalEntry;
        $journalEntry->date = date('Y-m-d');
        $journalEntry->notes = 'Expense made';
        $journalEntry->save();

        /* TODO: Partial and pendging payments */

        /* Expense account debit */
        $this->makeJournalEntryItem($journalEntry, 'expense', $expense->amount, 'debit');

        /* Cash/Bank account credit */

        if (strtolower($expense->expensePayments()->first()->expensePaymentType->name) == 'cash') {
            $accName = 'cash';
        } else if (strtolower($expense->expensePayments()->first()->expensePaymentType->name) == 'card') {
            $accName = 'banksaving';
        } else if (strtolower($expense->expensePayments()->first()->expensePaymentType->name) == 'fonepay') {
            $accName = 'banksaving';
        }
        $this->makeJournalEntryItem($journalEntry, $accName, $expense->amount, 'credit');

        $this->makeLedgerEntry($journalEntry);
    }

    public function makeJournalEntryItem($journalEntry, $account, $amount, $type)
    {
        $journalEntryItem = new JournalEntryItem;

        $journalEntryItem->journal_entry_id = $journalEntry->journal_entry_id;
        $journalEntryItem->ab_account_id = AbAccount::where('name', $account)->first()->getKey();
        $journalEntryItem->type = $type;
        $journalEntryItem->amount = $amount;

        $journalEntryItem->save();
    }
}

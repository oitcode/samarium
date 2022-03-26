<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger_entry', function (Blueprint $table) {
            $table->bigIncrements('ledger_entry_id');

            /*
             * Foreign key to ab_account table.
             *
             * Ledger of which account
             *
             */
            $table->unsignedBigInteger('ab_account_id');
            $table->foreign('ab_account_id', 'fk_ledger_entry__ab_account')
                ->references('ab_account_id')->on('ab_account');

            $table->date('date');

            /*
             * Foreign key to journal_entry table.
             */
            $table->unsignedBigInteger('journal_entry_id');
            $table->foreign('journal_entry_id', 'fk_ledger_entry__journal_entry')
                ->references('journal_entry_id')->on('journal_entry');

            $table->string('particulars');
            /*
             * Foreign key to ab_account table.
             *
             * Related account
             *
             */
            $table->unsignedBigInteger('related_ab_account_id');
            $table->foreign('related_ab_account_id', 'fk_ledger_entry__related_ab_account')
                ->references('ab_account_id')->on('ab_account');

            $table->string('type');
            $table->integer('amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledger_entry');
    }
}

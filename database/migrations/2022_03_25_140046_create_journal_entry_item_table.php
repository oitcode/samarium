<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalEntryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_entry_item', function (Blueprint $table) {
            $table->bigIncrements('journal_entry_item_id');

            /*
             * Foreign key to journal_entry table.
             */
            $table->unsignedBigInteger('journal_entry_id');
            $table->foreign('journal_entry_id', 'fk_journal_entry_item__journal_entry')
                ->references('journal_entry_id')->on('journal_entry');

            /*
             * Foreign key to ab_account table.
             */
            $table->unsignedBigInteger('ab_account_id');
            $table->foreign('ab_account_id', 'fk_journal_entry_item__ab_account')
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
        Schema::dropIfExists('journal_entry_item');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDaybookEntryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_daybook_entry_item', function (Blueprint $table) {
           $table->bigIncrements('sale_daybook_entry_item_id');

            /*
             * Foreign key to sale_daybook_entry table.
             */
            $table->unsignedBigInteger('sale_daybook_entry_id');
            $table->foreign('sale_daybook_entry_id', 'fk_sale_daybook_entry_item_sale_daybook_entry')
                ->references('sale_daybook_entry_id')->on('sale_daybook_entry');

            $table->string('title');
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
        Schema::dropIfExists('sale_daybook_entry_item');
    }
}

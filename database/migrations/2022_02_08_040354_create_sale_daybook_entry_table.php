<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDaybookEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_daybook_entry', function (Blueprint $table) {
           $table->bigIncrements('sale_daybook_entry_id');

            $table->date('sale_date');
            $table->string('customer');
            $table->integer('total_amount');
            $table->integer('cash_amount');
            $table->integer('credit_amount');

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
        Schema::dropIfExists('sale_daybook_entry');
    }
}

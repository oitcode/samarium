<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseAdditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_addition', function (Blueprint $table) {
            $table->bigIncrements('expense_addition_id');

            /*
             * Foreign key to expense table.
             */
            $table->unsignedBigInteger('expense_id');
            $table->foreign('expense_id', 'fk_expense_addition__expense')
                ->references('expense_id')->on('expense');

            /*
             * Foreign key to expense_addition_heading table.
             */
            $table->unsignedBigInteger('expense_addition_heading_id');
            $table->foreign('expense_addition_heading_id', 'fk_expense_addition__expense_addition_heading')
                ->references('expense_addition_heading_id')->on('expense_addition_heading');

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
        Schema::dropIfExists('expense_addition');
    }
}

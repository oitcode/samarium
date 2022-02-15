<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense', function (Blueprint $table) {
            $table->bigIncrements('expense_id');

            /*
             * Foreign key to expense_category table.
             */
            $table->unsignedBigInteger('expense_category_id');
            $table->foreign('expense_category_id', 'fk_expense_expense_category')
                ->references('expense_category_id')->on('expense_category');

            $table->date('date');
            $table->string('name', 255);
            $table->integer('amount');

            $table->timestamps();
            $table->string('comment', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expense');
    }
}

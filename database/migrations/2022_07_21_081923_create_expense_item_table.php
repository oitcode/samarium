<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_item', function (Blueprint $table) {
            $table->bigIncrements('expense_item_id');

            /*
             * Foreign key to expense table.
             */
            $table->unsignedBigInteger('expense_id');
            $table->foreign('expense_id', 'fk_expense_item__expense')
                ->references('expense_id')->on('expense');

            /*
             * Foreign key to expense_category table.
             */
            $table->unsignedBigInteger('expense_category_id');
            $table->foreign('expense_category_id', 'fk_expense_item__expense_category')
                ->references('expense_category_id')->on('expense_category');

            $table->string('name');
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
        Schema::dropIfExists('expense_item');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExpenseTableDropOldColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expense', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropForeign(['expense_category_id']);
            $table->dropColumn('expense_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expense', function (Blueprint $table) {
            $table->string('name')->nullable();

            /*
             * Foreign key to expense_category table.
             */
            $table->unsignedBigInteger('expense_category_id')->nullable();
            $table->foreign('expense_category_id', 'fk_expense_expense_category')
                ->references('expense_category_id')->on('expense_category');
        });
    }
}

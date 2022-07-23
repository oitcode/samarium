<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExpenseTableAddCreatorColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expense', function (Blueprint $table) {
            /*
             * Foreign key to users table.
             */
            $table->unsignedBigInteger('creator_id')->after('expense_id')->nullable();
            $table->foreign('creator_id', 'fk_expense__users')
                ->references('id')->on('users');
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
            $table->dropForeign('fk_expense__users');
            $table->dropColumn('creator_id');
        });
    }
}

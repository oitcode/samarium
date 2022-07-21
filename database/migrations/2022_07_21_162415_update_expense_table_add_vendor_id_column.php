<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExpenseTableAddVendorIdColumn extends Migration
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
             * Foreign key to vendor table.
             */
            $table->unsignedBigInteger('vendor_id')->after('expense_id')->nullable();
            $table->foreign('vendor_id', 'fk_expense__vendor')
                ->references('vendor_id')->on('vendor');
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
            $table->dropForeign('fk_expense__vendor');
            $table->dropColumn('vendor_id');
        });
    }
}

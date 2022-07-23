<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePurchaseTableAddCreatorColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase', function (Blueprint $table) {
            /*
             * Foreign key to users table.
             */
            $table->unsignedBigInteger('creator_id')->after('purchase_id')->nullable();
            $table->foreign('creator_id', 'fk_purchase__users')
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
        Schema::table('purchase', function (Blueprint $table) {
            $table->dropForeign('fk_purchase__users');
            $table->dropColumn('creator_id');
        });
    }
}

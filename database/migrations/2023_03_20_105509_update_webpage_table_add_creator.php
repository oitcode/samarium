<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWebpageTableAddCreator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webpage', function (Blueprint $table) {
            /*
             * Foreign key to users table.
             */
            $table->unsignedBigInteger('creator_id')->after('webpage_id')->nullable();
            $table->foreign('creator_id', 'fk_webpage__users')
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
        Schema::table('webpage', function (Blueprint $table) {
            $table->dropForeign('fk_webpage__users');
            $table->dropColumn('creator_id');
        });
    }
}

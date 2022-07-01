<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAbAccountTableAddAbAccountTypeIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ab_account', function (Blueprint $table) {
            /*
             * Foreign key to ab_account_type table.
             */
            $table->unsignedBigInteger('ab_account_type_id')->after('name')->nullable();
            $table->foreign('ab_account_type_id', 'fk_ab_account__ab_account_type')
                ->references('ab_account_type_id')->on('ab_account_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ab_account', function (Blueprint $table) {
            $table->dropForeign('fk_ab_account__ab_account_type');
            $table->dropColumn('ab_account_type_id');
        });
    }
}

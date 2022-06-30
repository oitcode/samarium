<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVendorTableAddAbAccountColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vendor', function (Blueprint $table) {
            /*
             * Foreign key to ab_account table.
             */
            $table->unsignedBigInteger('ab_account_id')->after('vendor_id')->nullable();
            $table->foreign('ab_account_id', 'fk_vendor__ab_account')
                ->references('ab_account_id')->on('ab_account');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendor', function (Blueprint $table) {
            $table->dropForeign('fk_vendor__ab_account');
            $table->dropColumn('ab_account_id');
        });
    }
}

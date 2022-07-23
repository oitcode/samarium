<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSaleInvoiceTableAddCreatorColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invoice', function (Blueprint $table) {
            /*
             * Foreign key to users table.
             */
            $table->unsignedBigInteger('creator_id')->after('sale_invoice_id')->nullable();
            $table->foreign('creator_id', 'fk_sale_invoice__users')
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
        Schema::table('sale_invoice', function (Blueprint $table) {
            $table->dropForeign('fk_sale_invoice__users');
            $table->dropColumn('creator_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSaleInvoiceTable extends Migration
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
             * Foreign key to takeaway table.
             */
            $table->unsignedBigInteger('takeaway_id')->after('seat_table_booking_id')->nullable();
            $table->foreign('takeaway_id', 'fk_sale_invoice__takeaway')
                ->references('takeaway_id')->on('takeaway');
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
            $table->dropForeign('fk_sale_invoice__takeaway');
            $table->dropColumn('takeaway_id');
        });
    }
}

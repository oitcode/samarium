<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSaleInvoiceItemTableAddPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invoice_item', function (Blueprint $table) {
            $table->integer('price_per_unit')->after('quantity')->nullable();
            $table->string('unit')->after('price_per_unit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_invoice_item', function (Blueprint $table) {
            $table->dropColumn('price_per_unit');
            $table->dropColumn('unit');
        });
    }
}

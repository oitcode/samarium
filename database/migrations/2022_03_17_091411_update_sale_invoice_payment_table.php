<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSaleInvoicePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invoice_payment', function (Blueprint $table) {
            /*
             * Foreign key to sale_invoice_payment_type table.
             */
            $table->unsignedBigInteger('sale_invoice_payment_type_id')->after('sale_invoice_payment_id')->nullable();
            $table->foreign('sale_invoice_payment_type_id', 'fk_sale_invoice_payment___sale_invoice_payment_type')
                ->references('sale_invoice_payment_type_id')->on('sale_invoice_payment_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_invoice_payment', function (Blueprint $table) {
            $table->dropForeign('fk_sale_invoice_payment___sale_invoice_payment_type');
            $table->dropColumn('sale_invoice_payment_type_id');
        });
    }
}

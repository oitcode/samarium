<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleInvoicePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoice_payment', function (Blueprint $table) {
            $table->bigIncrements('sale_invoice_payment_id');

            $table->date('payment_date');

            /*
             * Foreign key to sale_invoice table.
             */
            $table->unsignedBigInteger('sale_invoice_id');
            $table->foreign('sale_invoice_id', 'fk_sale_payment_sale_invoice')
                ->references('sale_invoice_id')->on('sale_invoice');


            $table->integer('amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_invoice_payment');
    }
}

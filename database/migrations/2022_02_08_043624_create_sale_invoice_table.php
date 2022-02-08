<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoice', function (Blueprint $table) {
            $table->bigIncrements('sale_invoice_id');

            $table->date('sale_invoice_date');

            /*
             * Foreign key to customer table.
             */
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'fk_sale_invoice_customer')
                ->references('customer_id')->on('customer');


            $table->integer('total_amount');
            $table->string('payment_status');

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
        Schema::dropIfExists('sale_invoice');
    }
}

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
             *
             * Todo: Really nullbale ?
             */
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'fk_sale_invoice_customer')
                ->references('customer_id')->on('customer');

            /*
             * Foreign key to seat_table table.
             *
             * For Cafe and resturants
             *
             */
            $table->unsignedBigInteger('seat_table_booking_id')->nullable();
            $table->foreign('seat_table_booking_id', 'fk_sale_invoice__seat_table_booking')
                ->references('seat_table_booking_id')->on('seat_table_booking');


            /* Todo: Really nullbale ? */
            $table->integer('total_amount')->nullable();
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

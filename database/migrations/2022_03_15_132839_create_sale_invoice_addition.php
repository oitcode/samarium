<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleInvoiceAddition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoice_addition', function (Blueprint $table) {
            $table->bigIncrements('sale_invoice_addition_id');

            /*
             * Foreign key to sale_invoice table.
             */
            $table->unsignedBigInteger('sale_invoice_id');
            $table->foreign('sale_invoice_id', 'fk_sale_invoice_addition__sale_invoice')
                ->references('sale_invoice_id')->on('sale_invoice');

            /*
             * Foreign key to sale_invoice_addition_heading table.
             */
            $table->unsignedBigInteger('sale_invoice_addition_heading_id');
            $table->foreign('sale_invoice_addition_heading_id', 'fk_sale_invoice_addition__sale_invoice_addition_heading')
                ->references('sale_invoice_addition_heading_id')->on('sale_invoice_addition_heading');

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
        Schema::dropIfExists('sale_invoice_addition');
    }
}

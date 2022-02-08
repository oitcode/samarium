<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleInvoiceItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoice_item', function (Blueprint $table) {
            $table->bigIncrements('sale_invoice_item_id');

            /*
             * Foreign key to sale_invoice table.
             */
            $table->unsignedBigInteger('sale_invoice_id');
            $table->foreign('sale_invoice_id', 'fk_sale_invoice_item_sale_invoice')
                ->references('sale_invoice_id')->on('sale_invoice');

            /*
             * Foreign key to product table.
             */
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'fk_sale_invoice_item_product')
                ->references('product_id')->on('product');

            $table->integer('quantity');

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
        Schema::dropIfExists('sale_invoice_item');
    }
}

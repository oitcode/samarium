<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleQuotationItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_quotation_item', function (Blueprint $table) {
            $table->bigIncrements('sale_quotation_item_id');

            /*
             * Foreign key to sale_quotation table.
             */
            $table->unsignedBigInteger('sale_quotation_id');
            $table->foreign('sale_quotation_id', 'fk_sale_quotation_item__sale_quotation')
                ->references('sale_quotation_id')->on('sale_quotation');

            /*
             * Foreign key to product table.
             */
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'fk_sale_quotation_item__product')
                ->references('product_id')->on('product');


            $table->decimal('quantity', 14, 2);
            $table->string('unit');
            $table->decimal('price_per_unit', 14, 2);
            $table->decimal('price_total', 14, 2);

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
        Schema::dropIfExists('sale_quotation_item');
    }
}

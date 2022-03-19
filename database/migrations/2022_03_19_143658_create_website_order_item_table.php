<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_order_item', function (Blueprint $table) {
            $table->bigIncrements('website_order_item_id');

            /*
             * Foreign key to website_order table.
             */
            $table->unsignedBigInteger('website_order_id');
            $table->foreign('website_order_id', 'fk_website_order_item__website_order')
                ->references('website_order_id')->on('website_order');

            /*
             * Foreign key to product table.
             */
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'fk_website_order_item__product')
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
        Schema::dropIfExists('website_order_item');
    }
}

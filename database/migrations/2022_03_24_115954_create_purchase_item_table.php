<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_item', function (Blueprint $table) {
            $table->bigIncrements('purchase_item_id');

            /*
             * Foreign key to purchase table.
             */
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id', 'fk_purchase_item__purchase')
                ->references('purchase_id')->on('purchase');

            /*
             * Foreign key to product table.
             */
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'fk_purchase_item__product')
                ->references('product_id')->on('product');

            $table->integer('quantity');
            $table->string('unit');
            $table->integer('purchase_price_per_unit')->nullable();
            $table->integer('purchase_price_total');

            $table->softDeletes();

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
        Schema::dropIfExists('purchase_item');
    }
}

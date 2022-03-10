<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_order', function (Blueprint $table) {
            $table->bigIncrements('website_order_id');

            /*
             * Foreign key to product table.
             */
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'fk_website_order__product')
                ->references('product_id')->on('product');

            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('status')->default('new');


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
        Schema::dropIfExists('website_order');
    }
}

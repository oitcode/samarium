<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_item', function (Blueprint $table) {
            $table->bigIncrements('sale_item_id');

            /*
             * Foreign key to sale table.
             */
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id', 'fk_sale_item_sale')
                ->references('sale_id')->on('sale');

            $table->string('title');
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
        Schema::dropIfExists('sale_item');
    }
}

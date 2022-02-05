<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale', function (Blueprint $table) {
            $table->bigIncrements('sale_id');

            $table->date('sale_date');

            /*
             * Foreign key to customer table.
             */
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'fk_sale_customer')
                ->references('customer_id')->on('customer');

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
        Schema::dropIfExists('sale');
    }
}

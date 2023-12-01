<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_quotation', function (Blueprint $table) {
            $table->bigIncrements('sale_quotation_id');

            $table->date('sale_quotation_date');

            /*
             * Foreign key to customer table.
             *
             * Todo: Really nullbale ?
             */
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'fk_sale_quotation__customer')
                ->references('customer_id')->on('customer');

            /*
             * Foreign key to users table.
             */
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id', 'fk_sale_quotation__users')
                ->references('id')->on('users');


            /* Todo: Really nullbale ? */
            $table->integer('total_amount')->nullable();

            $table->string('creation_status');

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
        Schema::dropIfExists('sale_quotation');
    }
}

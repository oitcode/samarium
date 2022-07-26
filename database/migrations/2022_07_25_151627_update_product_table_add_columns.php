<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            /*
             * Foreign key to product table.
             *
             * Yes, this has a foreign key to itself.
             * This is used for sub products which have a
             * base products. Each sub product of a product
             * will have a unique inventory unit consumption.
             *
             */
            $table->unsignedBigInteger('base_product_id')->after('product_id')->nullable();
            $table->foreign('base_product_id', 'fk_product__product')
                ->references('product_id')->on('product');

            $table->string('inventory_unit')->default('pcs');
            $table->integer('inventory_unit_consumption')->default(1);

            $table->boolean('is_active')->default(true);
            $table->boolean('is_base_product')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('fk_product__product');
            $table->dropColumn('base_product_id');

            $table->dropColumn('inventory_unit');
            $table->dropColumn('inventory_unit_consumption');
            $table->dropColumn('is_active');
            $table->dropColumn('is_base_product');
        });
    }
}

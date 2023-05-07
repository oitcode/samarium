<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductCategoryTableAddParentProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_category', function (Blueprint $table) {
            /*
             * Foreign key to product_category table (itself).
             *
             * This is the parent product category.
             */
            $table->unsignedBigInteger('parent_product_category_id')->nullable();
            $table->foreign('parent_product_category_id', 'fk_product_category__product_category')
                ->references('product_category_id')->on('product_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_category', function (Blueprint $table) {
            $table->dropForeign('fk_product_category__product_category');
            $table->dropColumn('parent_product_category_id');
        });
    }
}

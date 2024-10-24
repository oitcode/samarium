<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product', function (Blueprint $table) {
            /*
             * Foreign key to product_vendor table.
             */
            $table->unsignedBigInteger('product_vendor_id')->after('product_category_id')->nullable();
            $table->foreign('product_vendor_id', 'fk_product__product_vendor')
                ->references('product_vendor_id')->on('product_vendor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('fk_product__product_vendor');
            $table->dropColumn('product_vendor_id');
        });
    }
};

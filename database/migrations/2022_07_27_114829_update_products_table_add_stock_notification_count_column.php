<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTableAddStockNotificationCountColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->integer('stock_notification_count')->after('stock_count')->nullable();
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
            $table->dropColumn('stock_notification_count');
        });
    }
}

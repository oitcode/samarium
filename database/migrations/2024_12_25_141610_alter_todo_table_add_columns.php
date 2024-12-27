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
        Schema::table('todo', function (Blueprint $table) {
            $table->date('due_date')->nullable();
            $table->string('priority')->default('high');

            /*
             * Foreign key to users table.
             *
             */
            $table->unsignedBigInteger('assigned_to_id')->nullable();
            $table->foreign('assigned_to_id', 'fk_todo__users__assigned_to')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todo', function (Blueprint $table) {
            $table->dropColumn('due_date');
            $table->dropColumn('priority');

            $table->dropForeign('fk_todo__users__assigned_to');
            $table->dropColumn('assigned_to_id');
        });
    }
};

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
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('status', ['Enabled', 'Disabled'])->default('Enabled')->after('id');
                $table->enum('role', ['Client', 'Admin'])->default('Client')->after('status');
                $table->integer("cart_id")->after('role')->default(0);
                $table->integer("order_id")->after('cart_id')->default(0);
                $table->integer("created_user_id")->after('remember_token')->default(0);
                $table->integer("updated_user_id")->after('created_at')->default(0);
            });
        };
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('status');
                $table->dropColumn('role');
                $table->dropColumn('cart_id');
                $table->dropColumn('order_id');
                $table->dropColumn('created_user_id');
                $table->dropColumn('updated_user_id');
            });
        }
    }
};

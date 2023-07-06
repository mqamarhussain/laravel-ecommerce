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
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->string('sb_username')->nullable()->after('driver_name');
            $table->string('username')->nullable()->after('sb_username');
            $table->string('sb_user_password')->nullable()->after('username');
            $table->string('user_password')->nullable()->after('sb_user_password');
            $table->string('sb_signature')->nullable()->after('user_password');
            $table->string('signature')->nullable()->after('sb_signature');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropColumn('sb_username');
            $table->dropColumn('username');
            $table->dropColumn('sb_user_password');
            $table->dropColumn('user_password');
            $table->dropColumn('sb_signature');
            $table->dropColumn('signature');
        });
    }
};

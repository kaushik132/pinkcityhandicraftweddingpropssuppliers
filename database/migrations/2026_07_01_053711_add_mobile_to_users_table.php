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
        Schema::table('users', function (Blueprint $table) {
              $table->string('mobile_number', 20)->nullable()->after('email');
            $table->boolean('terms_accepted')->default(false)->after('password');
            $table->string('google_id')->nullable()->after('terms_accepted');
            $table->string('avatar')->nullable()->after('google_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
              $table->dropColumn(['mobile_number', 'terms_accepted', 'google_id', 'avatar']);
        });
    }
};

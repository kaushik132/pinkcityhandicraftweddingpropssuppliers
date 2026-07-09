<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('blogs', function (Blueprint $table) {
        $table->text('seo_title')->nullable()->after('content');
        $table->text('seo_description')->nullable()->after('seo_title');
        $table->text('seo_keywords')->nullable()->after('seo_description');
    });
}

public function down()
{
    Schema::table('blogs', function (Blueprint $table) {
        $table->dropColumn(['seo_title', 'seo_description', 'seo_keywords']);
    });
}
};

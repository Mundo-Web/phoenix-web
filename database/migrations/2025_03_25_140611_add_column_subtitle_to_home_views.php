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
        Schema::table('home_views', function (Blueprint $table) {
            $table->string('subtitle1section')->nullable();
            $table->string('subtitle3section')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_views', function (Blueprint $table) {
            $table->dropColumn('subtitle1section');
            $table->dropColumn('subtitle3section');
        });
    }
};

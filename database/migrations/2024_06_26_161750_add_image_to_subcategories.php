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
        Schema::table('subcategories', function (Blueprint $table) {
           
            $table->boolean('destacar')->nullable();
            $table->boolean('visible')->nullable()->default(true);
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('image');
            $table->dropColumn('destacar');
            $table->dropColumn('visible');
            $table->renameColumn('status', 'state')->default(false)->change();
        });
    }
};
